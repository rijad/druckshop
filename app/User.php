<?php

namespace App;

use App\Notifications\ResetPasswordNotification;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'users'; 

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    
    protected $fillable = [
        'name', 'email', 'password', 'verified'
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

      /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psOrders()
    {
        return $this->hasMany('App\PsOrder');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psPayments()
    {
        return $this->hasMany('App\PsPayment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psShippingAddresses()
    {
        return $this->hasMany('App\PsShippingAddress', 'order_id');
    }

    public function psOrderAttributes()
    {
        return $this->belongsToMany('App\OrderAttributes');
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function customer()
    {
        return $this->hasOne('App\CustomerArea', 'user_id'); 
    }


    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
