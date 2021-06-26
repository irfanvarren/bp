<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class StudentAuth
{
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next){
        session()->put('url.intended',url()->current());
        if(!Auth::guard()->check() ) {
           return redirect()->route('student-login');
       }else{
           if(!Auth::guard()->user()->is_student_bp()){
            
              return redirect()->route('student-login');
          }
      }
      return $next($request);
  }
}
