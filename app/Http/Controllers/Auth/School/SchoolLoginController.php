<?php
namespace App\Http\Controllers\Auth\School;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use App\Student;
use Illuminate\Validation\ValidationException;

class SchoolLoginController extends Controller
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

  protected function guard()
  {
    return Auth::guard();
  }

  public function __construct()
  {

    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm($role = null)
  {
    if(Auth::user()){
    //if(Auth::user()->hasRole('Student')){
        if(isset($route)){
          return redirect($route);
        }else{
          return redirect('search-schools');
        }
    //}else{
    //    return view('sekolah.auth.login')->withMessages('You are not a student or sub agent or school agent');
    //}
    }
    return view('sekolah.auth.login');
  }



  protected function redirectTo($route = null){
    if(isset($route)){
      return redirect($route);
    }else{
      return redirect('search-schools');
    }
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

  if(Auth::guard()->attempt($credentials)){ 
   
      //session()->put('url.intended');
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

   /*if(auth()->user()->hasRole('Merchant')){
     return $cobaLogin;
   }else{
   return redirect()->route('member-admin-login')->with('message','Anda Bukan Merchant !');
 }*/
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
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
  }

   protected function authenticated(Request $request, $user)
    {
        if ( $user->hasRole('Student')) {
           $route = session()->get('url.intended');
       
    if(isset($route) && $route != null && $route != "") {
       $this->redirectTo($route);
    }
    return redirect('search-schools');
  }

 return redirect()->route('school-login')->withMessages('You are not a student or sub agent or school agent');
    }


  /**
   * The user has been authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  mixed  $user
   * @return mixed
   */

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
    Auth::guard()->logout();
    return redirect('/');
  }

  public function verify(){
    return view('auth.verify');
  }



}
