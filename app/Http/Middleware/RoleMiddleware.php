<?php

namespace App\Http\Middleware;
use Session;
use Auth;

use Closure;

class RoleMiddleware
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
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            // dd($user_id);
        } 
        
            if(Auth::guard('admin')->user()->role == 0){
                Session::put('RoleMiddleware', true);
                return $next($request);
            }else{
                Session::put('RoleMiddleware', false);
                return $next($request); 
            }
        return $next($request);
    }
}
