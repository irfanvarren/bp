<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminAuth
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
        
        if(Auth::guard('web')->check() && (Auth::guard()->user()->hasRole('Admin') || Auth::guard()->user()->hasRole('Super Admin') || Auth::guard()->user()->hasRole('Staff'))) {
            return $next($request);
        }
        session(['url.intended' => url()->current()]);
        
        return redirect()->route('admin-login')->with('message', 'Anda Bukan Admin ! Tolong Login Sebagai Admin Terlebih Dahulu !');

    }
}
