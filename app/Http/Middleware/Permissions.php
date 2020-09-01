<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\UserPermissions;

class Permissions
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
        }else{
            return redirect('/admin/dashboard');
        }


    $users = UserPermissions::where('user_id' , $user_id)->first();
    if(!empty($users) || !is_null($users)){

    $data = json_decode($users->permissions, true);
    }else{
        $data = ['Parameter'=> 0, 'Return orders' => 0, 'Sliders' => 0, 'Latest' => 0, 'Change Orders Attributes' => 0, 'Order Files' => 0];
    }
    // $data = json_decode($users->permissions, true);
            if(array_key_exists($permission, $data)){

                if($data[$permission] == 1){
                    return $next($request);
                }else{
                    return redirect('/admin/dashboard');
                }

            }else{
                return redirect('/admin/dashboard');
            }

            return $next($request); 
    }
}
