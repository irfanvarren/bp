<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use App\User;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function redirectTo(){
        if(session()->has('url.intended')){
                if(session('url.intended') == url('register') || session('url.intended') == url('login') || session('url.intended') == url()->current()){
        return 'home';
        }
            return session('url.intended');
        }
        return 'home';
    }

    public function show(Request $request)
    {
        $request->user()->sendEmailVerificationNotification(); 
        
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        return $request->user()->hasVerifiedEmail()
        ? redirect($this->redirectPath())
        : view('auth.verify');
    }

    public function verify(Request $request)
    {

        if ($request->route('id') != $request->user()->getKey()) {
            abort(403,"Wrong Account! current logged in account : ".$request->user()->email.', to be verified account : '.User::find($request->route('id'))->email);
        }

        if ($request->user()->hasVerifiedEmail()) {
        if(session('url.intended') == url('register') || session('url.intended') == url('login')){
        return redirect('/');
        }
           return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if (session()->has('url.intended')) {
        if(session('url.intended') == url('register') || session('url.intended') == url('login')){
        return redirect('/');
        }
          return redirect(session('url.intended'));
      }
      return redirect($this->redirectPath())->with('verified', true);
  }
}