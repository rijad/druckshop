<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'ps_order_details';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
 
    /**
     * @var array
     */
    protected $fillable = ['user_id','order_id', 'no_of_copies','no_of_cds' , 'shipping_company', 
    'promo_code', 'shipping_address','billing_address','email_id','total','created_at', 
    'updated_at','deleted_at'];


    public function psUsers()
    {
        return $this->belongsToMany('App\User'); 
    }
    
}
 