<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\UserPermissions;

class OrderAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (Auth::user()) {
            $user_id = Auth::user()->id;
        } 
        
        $users = UserPermissions::where('user_id' , $user_id)->first();
        if(!empty($users) || $users!= 'null'){
    
        $data = json_decode($users->permissions, true);
        }else{
            $data = ['Parameter'=> 0, 'Return orders' => 0, 'Sliders' => 0, 'Latest' => 0, 'Change Orders Attributes' => 0, 'Order Files' => 0];
        }
        // $data = json_decode($users->permissions, true);
                if(array_key_exists('Change Orders Attributes', $data)){
    
                    if($data['Change Orders Attributes'] == 1){
                        \session('Change Orders Attributes', true);
                        return $next($request);
                    }else{
                        \session('Change Orders Attributes', false);
                        return redirect('/admin/dashboard');
                    }

                    if($data['Order Files'] == 1){

                        \session('Order Files', true);
                        // return $next($request);
                    }else{
                        \session('Order Files', false);
                    }
    
                }else{
                    return redirect('/admin/dashboard');
                }
                return $next($request);
    }
}
