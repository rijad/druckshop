<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\UserPermissions;
use Session;


class OrderFiles
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
        } 
       
        $users = UserPermissions::where('user_id' , $user_id)->first();
       if(!empty($users) || !is_null($users)){
    
        $data = json_decode($users->permissions, true);
        }else{ 
            $data = ['Parameter'=> 0, 'Return orders' => 0, 'Sliders' => 0, 'Latest' => 0, 'Change Orders Attributes' => 0, 'Order Files' => 0];
        }
        
        
        if(array_key_exists('Order Files', $data)){    

            if($data['Order Files'] == 1){
                 Session::put('Order Files', true);
                 return $next($request);
            }else{
                 Session::put('Order Files', false);
                 return $next($request); 
            }

        }    
    
       // return $next($request); 
    }
}
