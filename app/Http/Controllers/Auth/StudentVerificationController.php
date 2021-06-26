<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;	
use Illuminate\Auth\Access\AuthorizationException;

class StudentVerificationController extends Controller
{
    use VerifiesEmails;
    public function __construct()
    {
        $this->middleware('student-auth');
        $this->middleware('signed')->only('student.verify');
        $this->middleware('throttle:6,1')->only('student.verify', 'student.resend');
    }
    public $redirectTo = "student";

    public function show(Request $request)
    {
          $request->user()->sendStudentEmailVerificationNotification();
        return $request->user()->hasVerifiedEmail()
                        ? redirect($this->redirectPath())
                        : view('auth.student-verify');
    }

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function verify(Request $request)
    {
        if ($request->route('id') != $request->user()->getKey()) {
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        return redirect($this->redirectPath())->with('verified', true);
    }

    /**
     * Resend the email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect($this->redirectPath());
        }
        
        $request->user()->sendStudentEmailVerificationNotification();

        return back()->with('resent', true);
    }

     protected function redirectTo(){

    if(session()->get("url.intended")){
        return session()->get("url.intended");
    }

    return $this->redirectTo;
    }

}
