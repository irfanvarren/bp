<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;


class MemberAdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
  //  protected $redirectTo = '/merchant/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('merchant');
    }
    public function __construct()
    {

      //  $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {

     return view('merchant.auth.login');


 }
 protected function redirectTo(){

    return route('merchant');

}

public function login(Request $request)
{
   
    $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
    if (method_exists($this, 'hasTooManyLoginAttempts') &&
        $this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);

    return $this->sendLockoutResponse($request);
}
if (Auth::guard('merchant')->attempt($this->credentials($request),true)) {
  $this->sendLoginResponse($request);
  return redirect()->intended($this->redirectPath());
}

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
        if( $this->guard()->check()){
            redirect()->intended($this->redirectPath());
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
      Auth::guard('merchant')->logout();
      return redirect('/merchant');
  }


}
