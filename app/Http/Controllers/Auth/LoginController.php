<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    protected function redirectTo($route = null){
      return $route;
    }
    public function showLoginForm()
    {

      if(!session()->has('url.intended') || (session()->has('url.intended') && url()->current() == session('url.intended')))
      {
        if(url()->previous() != url()->current() && url()->previous() != url('getCartEvent')){
          session(['url.intended' => url()->previous()]);
        }else{
          if(url()->current() == url('admin/login')){
            session(['url.intended' => url('admin')]);
          }
          session(['url.intended' => url('home')]);
        }
      }
      
      return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
      $request->validate([
        $this->username() => 'required|string',
        'password' => 'required|string',
      ]);
    }
    public function username()
    {
      return 'username';
    }

    public function login(Request $request)
    { 
      $input = $request->all();

      $this->validateLogin($request);
      if (method_exists($this, 'hasTooManyLoginAttempts') &&
        $this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
      return $this->sendLockoutResponse($request);
    }

    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
           //if($this->attemptLogin($request));
    
    if (auth()->attempt(array($fieldType => $request->username, 'password' => $request->password),true)) {
      $route = session()->get('url.intended');
      if(\URL::previous() == $route){
        if(Auth::guard()->user()->hasRole('Admin') || Auth::guard()->user()->hasRole('Super Admin') || Auth::guard()->user()->hasRole('Staff')){
          return redirect('admin');
        }
        return redirect('home');

      }
      if(isset($route)){
        if($route != null){
          $this->redirectTo($route);
        }
      }else if($request->redirect_url != ""){
        return redirect($request->redirect_url);
      }
      return $this->sendLoginResponse($request);
    }
          // If the login attempt was unsuccessful we will increment the number of attempts
          // to login and redirect the user back to the login form. Of course, when this
          // user surpasses their maximum number of attempts they will get locked out.
    $this->incrementLoginAttempts($request);
    return $this->sendFailedLoginResponse($request);
  }




}
