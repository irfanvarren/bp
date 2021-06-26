<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Merchant;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class MemberAdminRegisterController extends Controller
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

    use RegistersUsers,HasRoles;
//use RedirectsUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showRegistrationForm()
    {
       return view('merchant.auth.register');
   }

   public function __construct()
   {
          //$this->middleware('member-auth');
   }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:merchants'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_telepon' => ['required', 'string', 'max:255' ],
            'alamat' => ['required', 'string', 'max:255' ],
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
        $merchant =  Merchant::create([
            'name' => $data['name'],
            'slug' => $data['slug'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
            'no_telepon' => $data['no_telepon'],
        ]);

        $merchant->assignRole(4);
        return $merchant;
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('merchant-register')->with('message','Data Sudah Terkirim ! <br> Proses pendaftaran membutuhkan waktu 3-5 hari terkait pengecekan data <br> info selanjutnya akan kami kirim sesuai email yang anda berikan !');
    }

    public function check_slug(Request $request){
        $model = new Merchant;
        $slug = str_slug($request->slug);
        $data = array();
        if($model::whereSlug($slug)->exists()){
         $data['error'] = 'Domain '.$slug.' sudah terdaftar. Tolong gunakan domain lain';
     }else{
       $data['slug']= $slug;
   }
   return $data;
}


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('merchant');
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
    protected function redirectTo()
    {
        if (session('url.intended')) {
      //      return session('url.intended');
        }
    //    return '/';
    }
}
