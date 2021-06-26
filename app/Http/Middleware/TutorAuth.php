<?php
namespace App\Http\Middleware;

use Closure;
use Auth;

class TutorAuth
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
        if(Auth::guard('web')->check() && ( Auth::guard('web')->user()->hasRole('Tutor') || Auth::guard('web')->user()->hasRole('Super Admin') ) ) {
            return $next($request);
        }else{
              return redirect()->route('tutor-login')->with('message', 'Anda Bukan Tutor !');
          
        } 
    }
}
