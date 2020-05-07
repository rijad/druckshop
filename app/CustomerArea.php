<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerArea extends Model
{
    protected $table = 'ps_customer_area';

    protected $fillable = ['user_id', 'email', 'dob', 'address', 'image', 'status', 'phone', 
    'shipping_address', 'billing_address', 'created_at', 'updated_at', 'deleted_at'];

    public function details()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
