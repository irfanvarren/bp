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
       if(Auth::guard()->check() && (Auth::guard()->user()->hasRole('Student') || Auth::guard()->user()->hasRole('Super Admin') ) ){
            return $next($request);
        }else{
            return redirect()->route('student-login');
        }
        return $next($request);
    }
}
