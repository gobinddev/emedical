<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
        if (Auth::guard($guard)->check()) {
            
            if(stripos($guard,'vendor')!==false)
            {
                return redirect('/vendor/home');
            }

            if(stripos($guard,'customer')!==false)
            {
                return redirect('/');
            }
            // return redirect(RouteServiceProvider::HOME);
            return redirect('/admin/home');
        }

        return $next($request);
    }
}
