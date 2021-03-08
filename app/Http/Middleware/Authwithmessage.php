<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class Authwithmessage
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
        session()->put('social_redirect',url()->current());
           if(Auth::guest()) {
              return redirect()->guest('login')->with('message', 'Untuk Melanjutkan ke Halaman Tujuan Anda, Harap Login Terlebih Dahulu !');
           }

           return $next($request);
       }
}
