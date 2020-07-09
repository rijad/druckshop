<?php

namespace App\Http\Middleware;
use App\UserPermissions;
use Session;
use Auth;

use Closure;

class Latest
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
        
        
        if(array_key_exists('Latest', $data)){    

            if($data['Latest'] == 1){
                 Session::put('Latest', true);
                 return $next($request);
            }else{
                 Session::put('Latest', false);
                 return $next($request); 
            }

        }    
    
       // return $next($request); 
    }
}
