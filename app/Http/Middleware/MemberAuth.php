<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
class MemberAuth
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
      if(Auth::guard('merchant')->check()) {
        $request->session()->put('url.intended',url()->current());

        return redirect()->route('member-admin-login');

      }
      return $next($request);

    }


}
