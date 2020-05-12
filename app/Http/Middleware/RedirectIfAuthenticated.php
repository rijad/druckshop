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

        if ($request->segment(1) == "admin") {
            $guard = "admin";
        }

        if ($request->segment(1) == "login") {
            $guard = "web";
        }

        if ($guard == "admin" && Auth::guard($guard)->check()) {
            
            return redirect('/admin/dashboard');
        }

        if ($guard == "web" && Auth::guard($guard)->check()) {
            return redirect('/home');
        }


        return $next($request);
    }
}
