<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class SchoolAuth
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
     if(Auth::guard()->check() /*&& (Auth::guard()->user()->hasRole('Student') || Auth::guard()->user()->hasRole('Marketing') || Auth::guard()->user()->hasRole('Schools') || Auth::guard()->user()->hasRole('Admin'))*/){
            session()->put('search-schools.role_id',Auth::guard()->user());   
           

            return $next($request);
        }else{
            return redirect('search-schools/login');
        }
        return $next($request);
    }
}
