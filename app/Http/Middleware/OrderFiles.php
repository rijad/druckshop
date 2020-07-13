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
            $data = ['Parameter'=> 0, 'Return orders' => 0, 'Sliders' => 0, 'Latest' => 0, 'Change Orders Attributes' => 0, 'Send link for new file' => 0];
        }
        
        
        if(array_key_exists('Send link for new file', $data)){    

            if($data['Send link for new file'] == 1){
                 Session::put('Send link for new file', true);
                 return $next($request);
            }else{
                 Session::put('Send link for new file', false);
                 return $next($request); 
            }

        }    
    
       // return $next($request); 
    }
}
