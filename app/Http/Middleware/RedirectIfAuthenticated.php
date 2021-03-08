<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      if(Auth::guard('web') && Auth::guard('web')->check()){
        return $next($request);
      }else if(Auth::guard('merchant') && Auth::guard('merchant')->check()){
        return redirect()->route('member-admin-login');
      }
      return $next($request);

    }
  }
