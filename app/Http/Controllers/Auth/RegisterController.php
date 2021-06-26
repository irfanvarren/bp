<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_telepon' => ['required', 'string', 'max:255' ],
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

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'no_telepon' => $data['no_telepon'],
            'password' => Hash::make($data['password']),
        ]);
        return $user;

      //$user->assignRole(4);
      //if(preg_match("/$search/i", $data['name']) ) {
      //dd("true");
      //}

    }
    public function register(Request $request)
    {
        $cek_user = User::where('email',$request->email)->first();
        $route = session()->get('url.intended');
        if(!$cek_user){

            $this->validator($request->all())->validate();

            $search[] = "http";
            $search[] = "https";
            $search[] = "bitcoin";
            $search[] = "$";
            $search[] = "www.";
            $cek_bitcoin = FALSE;
            foreach($search as $cek){
                if(strpos($request->name, $cek) !== false ){
                  $cek_bitcoin = TRUE;
                  return redirect('/')->with('message','User Has Been Successfully Created !');
              }else{
                $cek_bitcoin = FALSE;

            }
        }
        if($cek_bitcoin == FALSE){

            event(new Registered($user = $this->create($request->all())));
            $this->guard()->login($user);


            return redirect('login')->with('message','This User Has Been Registered, Please Log In !');
            //return $this->registered($request, $user)
            //?: redirect($this->redirectPath());

        }else{
            return redirect('/login')->with('message','User Has Been Successfully Created !');
        }
    }else{
         $this->guard()->login($cek_user);
            return redirect('login')->with('message','This User Has Been Registered, Please Log In !');
        
    }
    }

 protected function redirectTo(){
     $route = session()->get('url.intended');
    if($route != ""){
        return $route;
    }
  return "login";
}

     protected function guard()
      {
        return Auth::guard();   
      }
}
