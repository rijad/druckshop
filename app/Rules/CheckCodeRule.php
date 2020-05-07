<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Discount;

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
    {  //dd(Discount::where(['code' => $value])->where('from_date' ,'>' ,date('Y-m-d'))->first() . date('Y-m-d') );
       if(Discount::where(['code' => $value])->where('to_date' ,'<' ,date('Y-m-d'))->first() == null || Discount::where(['code' => $value])->where('from_date' ,'>' ,date('Y-m-d'))->first() == null){
   
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
        return 'The Discount Code is expired.';
    }


}
