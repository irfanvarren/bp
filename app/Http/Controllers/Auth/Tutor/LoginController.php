<?php

namespace App\Http\Controllers\Auth\Tutor;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Student;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class LoginController extends Controller
{
  use AuthenticatesUsers; 
  /**
   * Where to redirect users after login.
   *
   * @var string
   */

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {

    //  $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {
    if(!session()->has('url.intended'))
    {
      session(['url.intended' => url()->previous()]);
    }
    $guards = config('auth.guards');
    foreach($guards as $key => $value){
      if(Auth::guard($key)->check()){
        Auth::guard($key)->logout();
      }
    }
    
    return view('auth.tutor.login');
  }



  protected function redirectTo($route = null){
    if(isset($route)){
      return redirect($route);
    }else{
      return route('tutor-login');
    }
  }

  public function register(){
    return view('auth.tutor.register');
  }

  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'no_telepon' => ['required', 'string', 'max:255' ],
    ]);
  }

  protected function create(array $data)
  {

    $user = User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'no_telepon' => $data['no_telepon'],
      'password' => Hash::make($data['password']),
    ]);
      //  $user->assignRole(4);
    return $user;

      //if(preg_match("/$search/i", $data['name']) ) {
      //dd("true");
      //}


  }

  protected function registered(Request $request, $user)
  {
        //
  }

  public function postRegister(Request $request){
   $this->validator($request->all())->validate();

   $user = $this->create($request->all());
   $this->guard()->login($user);


   return $this->registered($request, $user)
   ?: redirect('/tutor-admin')->with('message','User Has Been Successfully Created !');

 }




 public function login(Request $request)
 {
   // $password = $request->password;
  //  $password2 = Student::where('email',$request->email)->value('password');
  // $request->merge(['password' => $password]);
   // dd(Hash::check($password,$password2));
  $guards = config('auth.guards');
  foreach($guards as $key => $value){
    if(Auth::guard($key)->check()){
      Auth::guard($key)->logout();
    }
  }

  $this->validateLogin($request);

      // If the class is using the ThrottlesLogins trait, we can automatically throttle
      // the login attempts for this application. We'll key this by the username and
      // the IP address of the client making these requests into this application.
  if (method_exists($this, 'hasTooManyLoginAttempts') &&
    $this->hasTooManyLoginAttempts($request)) {
    $this->fireLockoutEvent($request);

  return $this->sendLockoutResponse($request);
}
     // if ($this->attemptLogin($request)) {
$credentials = $request->only('email', 'password');



if (Auth::guard('web')->attempt($this->credentials($request))) {
  $route = session()->get('url.intended');
  if(isset($route)){
    return redirect($route);
  }

  return $this->sendLoginResponse($request);
}
      //}else{
        //dd("gagal");
      //}


      // If the login attempt was unsuccessful we will increment the number of attempts
      // to login and redirect the user back to the login form. Of course, when this
      // user surpasses their maximum number of attempts they will get locked out.
$this->incrementLoginAttempts($request);

return $this->sendFailedLoginResponse($request);
}

  /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function validateLogin(Request $request)
  {
    $request->validate([
      $this->username() => 'required|string',
      'password' => 'required|string',
    ]);
  }

  /**
   * Attempt to log the user into the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return bool
   */
  protected function attemptLogin(Request $request)
  {
    return  $this->guard()->attempt(
     $this->credentials($request), $request->filled('remember')
   );

   
}

  /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  protected function credentials(Request $request)
  {
    return $request->only($this->username(), 'password');
  }

  /**
   * Send the response after the user was authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  protected function sendLoginResponse(Request $request)
  {
    $request->session()->regenerate();

    $this->clearLoginAttempts($request);
    if($this->guard()->check()){

      return redirect()->route('tutor-dashboard');
    }else{
      dd("error");
    }
    //  return $this->authenticated($request, $this->guard()->user())
      //      ?: redirect()->intended($this->redirectPath());
  }

  /**
   * The user has been authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  mixed  $user
   * @return mixed
   */
  protected function authenticated(Request $request, $user)
  {
  }

  /**
   * Get the failed login response instance.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Symfony\Component\HttpFoundation\Response
   *
   * @throws \Illuminate\Validation\ValidationException
   */
  protected function sendFailedLoginResponse(Request $request)
  {
    throw ValidationException::withMessages([
      $this->username() => [trans('auth.failed')],
    ]);
  }

  /**
   * Get the login username to be used by the controller.
   *
   * @return string
   */
  public function username()
  {
    return 'email';
  }

  /**
   * Log the user out of the application.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function logout(Request $request){
    Auth::guard('web')->logout();
    return redirect('/');
  }
}
