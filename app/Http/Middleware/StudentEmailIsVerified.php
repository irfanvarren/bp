<?php

namespace App\Http\Middleware;

use Closure;
use App\Student;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class StudentEmailIsVerified extends EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$redirectToRoute = "")
    {

        if (!$request->user() ||
        ($request->user() instanceof MustVerifyEmail &&
            !$request->user()->hasVerifiedEmail())) {
       
        return $request->expectsJson()
            ? abort(403, 'Your email address is not verified.')
            : Redirect::route('student.verify');
      }
      return $next($request);
    
    }
}
