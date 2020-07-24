<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Discount;
use App\OrderDetailsFinal;
use Auth;

class CheckCodeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes. 
     * 
     * @param  string  $attribute 
     * @param  mixed  $value
     * @return bool
     */
     public function passes($attribute, $value)
     {   

       if (Auth::check()){
           $user_id = Auth::user()->id;
       }else{
            $user_id = Session::get('user_id');
       }

       // check if user has already used a code

       if(OrderDetailsFinal::where(['user_id' => $user_id, 'promo_code' => $value])->first() != null){

        return false;
        
       }


       // check validity of code wrt date

       if(Discount::where(['code' => $value])->where('to_date' ,'<' ,date('Y-m-d'))->first() == null && Discount::where(['code' => $value])->where('from_date' ,'>' ,date('Y-m-d'))->first() == null){
   
        return true;

       }

       if(Discount::where(['code' => $value])->whereNull('to_date')->first() != null && Discount::where(['code' => $value])->where('from_date' ,'>' ,date('Y-m-d'))->first() == null){

         return true;

       }else{

        return false;

       }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Discount Code is Invalid.';
    }


}
