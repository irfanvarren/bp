<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
class MerchantAuth
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
        if(!Auth::guard('merchant')->check()) {
        $request->session()->put('url.intended',url()->current());
        return redirect()->route('merchant-login');
    }
    if(!Auth::guard('merchant')->user()->status){
        return redirect()->route('merchant-login')->withMessage("Akun merchant dengan email ".Auth::guard('merchant')->user()->email." masih dalam proses pengecekan, kami akan segera memberikan notifikasi ke email tersebut, apabila akun telah diverifikasi");
    }
    return $next($request);

}


}
