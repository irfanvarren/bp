<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
     /**
      * The authentication factory instance.
      *
      * @var \Illuminate\Contracts\Auth\Factory
      */
  
     /*protected $guards;
     /**
      * Create a new middleware instance.
      *
      * @param  \Illuminate\Contracts\Auth\Factory  $auth
      * @return void
      */
  /*   public function __construct(Auth $auth)
     {
         $this->auth = $auth;
     }

     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure  $next
      * @param  string[]  ...$guards
      * @return mixed
      *
      * @throws \Illuminate\Auth\AuthenticationException
      */
/*     public function handle($request, Closure $next, ...$guards)
     {
       $this->guards = $guards
       ;
         $this->authenticate($request, $guards);
         return $next($request);
     }

     /**
      * Determine if the user is logged in to any of the given guards.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  array  $guards
      * @return void
      *
      * @throws \Illuminate\Auth\AuthenticationException
      */
    /* protected function authenticate($request, array $guards)
     {
         if (empty($guards)) {
             $guards = [null];
         }

         foreach ($guards as $guard) {
             if ($this->auth->guard($guard)->check()) {
                 return $this->auth->shouldUse($guard);
             }
         }

         throw new AuthenticationException(
             'Unauthenticated.', $guards, $this->redirectTo($request)
         );
     }*/
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
        //    return route('login');
        }
    }
}
