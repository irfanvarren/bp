<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use App\Country;
use App\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use App\Models\Student\PersonalInformation;
use App\Models\Student\BankAccountDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegisterAutoReply;


class StudentRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/search-schools/student/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm(){

      $countries = Country::orderBy('name')->get();
      $sales = Sales::where('AKTIF',1)->get();
      return view('student.auth.register',['countries' => $countries,'sales' => $sales]);
      
    }

    protected function validator(array $data)
    {
      return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

      $user = Student::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
      ]);
      //  $user->assignRole(4);
      return $user;

      //if(preg_match("/$search/i", $data['name']) ) {
      //dd("true");
      //}


    }
    public function register(Request $request)
    {
     $country_id = Country::where('cca3',$request->visa_country)->value('id');
     $student_number = Student::where('country',$country_id)->get();
     $student_number = count($student_number) + 1;
     $numbering = str_pad($student_number,5,'0',STR_PAD_LEFT);
     $email = auth()->user()->email;
     $cek_akun = User::where('email',$email)->get();
     if(!count($cek_akun)){

      $input_data_user = collect();
        //$input_data_user = $input_data_user->merge(['client_id' => $client_id]);
      $input_data_user = $input_data_user->merge(['name' => $request->full_name]);
      $input_data_user = $input_data_user->merge(['marketing_id' => $request->marketing_id]);
      $input_data_user = $input_data_user->merge(['email' => $email]);
      $input_data_user = $input_data_user->merge(['no_telepon' => $request->phone_number]);
      $input_data_user = $input_data_user->merge(['password' => Hash::make($request->password)]);
      $insert_user = User::create($input_data_user->toArray());
      $user_id = $insert_user->id;
    }else{
      $insert_user =  User::where('email',$email)->first();
      $user_id = $insert_user->id;
    }
  //akun bp kasik role student
    $insert_user->assignRole('student');



    //student

    $input_data_student = collect();
    $input_data_student = $input_data_student->merge(['country' => $country_id]);
    $input_data_student = $input_data_student->merge(['marketing_id' => $request->marketing_id]);
    $input_data_student = $input_data_student->merge(['visa_status' => 0]);
    $input_data_student = $input_data_student->merge(['status' => 0 ]);
    $input_data_student = $input_data_student->merge(['name' => $request->full_name]);
    $input_data_student = $input_data_student->merge(['email' => $email]);
    $input_data_student = $input_data_student->merge(['password' => "-"]);
    /*$input_data_student = $input_data_student->merge(['client_id' => $client_id]);*/
    $input_data_student = $input_data_student->merge(['user_id' => $user_id]);
    $input_data_student = $input_data_student->merge(['no_telepon' => $request->phone_number]);


    if($insert_user->is_student()) { // cek user adalah student atau bukan
      $cek_previous_country = Student::where('user_id',$user_id)->where('country',$country_id)->first();  
      if($cek_previous_country){
        $insert_student = $cek_previous_country;
      }else{
        try{
          $insert_student = Student::create($input_data_student->toArray());
        }catch(Exception $e){
          abort(403);
        }
      }
    }else{
       try{
          $insert_student = Student::create($input_data_student->toArray());
        }catch(Exception $e){
          abort(403);
        }
    }

        //personal information atau visa statement letter
    $student_id = $insert_student->id;

    $path = 'public/students/'.$student_id."/";
    $file = $request->signature;
    $encoded_image = explode(",",$file)[1];
    $decoded_image = base64_decode($encoded_image);
    $image_name = "signature".time().".png";
    $signature = Storage::disk('local')->put($path.$image_name,$decoded_image);
    $path_signature = Storage::disk('local')->url($path.$image_name);
    $input_data_personal_information = collect();
    $input_data_personal_information = $input_data_personal_information->merge(['student_id' => $student_id]);
    $input_data_personal_information = $input_data_personal_information->merge(['homecountry_country' => $request->homecountry_country]);
    $input_data_personal_information = $input_data_personal_information->merge(['homecountry_address' => $request->homecountry_address]);
    $input_data_personal_information = $input_data_personal_information->merge(['homecountry_suburb' => $request->homecountry_suburb]);
    $input_data_personal_information = $input_data_personal_information->merge(['homecountry_state' => $request->homecountry_state ]);
    $input_data_personal_information = $input_data_personal_information->merge(['homecountry_postcode' => $request->homecountry_postcode]);
    $input_data_personal_information = $input_data_personal_information->merge(['name' => $request->full_name]);
    $input_data_personal_information = $input_data_personal_information->merge(['primary_email' => $email]);
    $input_data_personal_information = $input_data_personal_information->merge(['gender' => $request->gender]);
    $date_of_birth = $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tanggal_lahir;
    $input_data_personal_information = $input_data_personal_information->merge(['date_of_birth' => $date_of_birth]);
    $input_data_personal_information = $input_data_personal_information->merge(['phone_number' => $request->phone_number]);
    $input_data_personal_information = $input_data_personal_information->merge(['signature' => $path_signature]);
    $insert_personal_information = PersonalInformation::create($input_data_personal_information->toArray());


        //bank
    // $input_data_bank = collect();
    // $input_data_bank = $input_data_bank->merge(['student_id' => $student_id]);
    // $input_data_bank = $input_data_bank->merge(['bank_name' => $request->bank_name]);
    // $input_data_bank = $input_data_bank->merge(['account_name' => $request->account_name]);
    // $input_data_bank = $input_data_bank->merge(['account_number' => $request->account_number]);
    // $input_data_bank = $input_data_bank->merge(['bsb' => $request->bsb]);
    // $input_data_bank = $input_data_bank->merge(['swift_code' => $request->swift_code]);
    // $input_data_bank = $input_data_bank->merge(['address' => $request->bank_address]);
    // $input_data_bank = $input_data_bank->merge(['account_location_type' => "homecountry"]);
    // $insert_bank_account_details = BankAccountDetail::create($input_data_bank->toArray());

        //history visa
    $input_data_visa = collect();
    $input_data_visa = $input_data_visa->merge(['country' => $request->country_id]);
    $input_data_visa = $input_data_visa->merge(['student_id' => $student_id]);
    $request->merge(['email' => $email]);
    Mail::send(new StudentRegisterAutoReply($request));
        //login
    $this->guard()->login($insert_user);
    return $this->registered($request, $insert_user)
    ? : redirect($this->redirectPath());

  }   

  protected function guard()
  {
    return Auth::guard();   
  }

  protected function redirectTo()
  {
   //  if (session('url.intended')) {
   //   return session('url.intended');
   // }
   return route('student-dashboard');
 }
}
