<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class SchoolAgentAuth
{
/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guard('web')->check()) {
            //  dd(Auth::guard('student')->user()->roles);
            /*if(!Auth::guard('web')->user()->hasRole('Tutor'))
           {
            dd("anda bukan tutor");

            }*/

            return $next($request);
        }else{
              return redirect()->route('tutor-login')->with('message', 'Anda Bukan Tutor !');
          
        } 
  //        return $next($request);
    }
}
