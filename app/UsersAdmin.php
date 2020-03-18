<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersAdmin extends Authenticatable
{
   use Notifiable; 
 
    /**
     * The table associated with the model.
     *  
     * @var string
     */
    protected $table = 'users_admin';
 
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $guard = 'admin';
    protected $fillable = [
        'name', 'email', 'password','role','status'
    ]; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $keyType = 'integer';
}
 