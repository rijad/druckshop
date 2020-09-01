<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\UsersAdmin;

class OldPwdRule implements Rule
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
        

            $pass_id = UsersAdmin::find(auth()->guard('admin')->user()->id);
            
            if(!Hash::check($value, $pass_id->password)){
                return false;
            }else{
                
                return true;
            }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Old password is not correct.';
    }
}
