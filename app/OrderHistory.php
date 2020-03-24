<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'ps_order_history';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
 
    /**
     * @var array
     */
    protected $fillable = ['user_id','status', 'attribute', 'value', 'created_at', 
    'updated_at', 'deleted_at'];


    public function psUsers()
    {
        return $this->belongsToMany('App\User'); 
    }

    public function OrderFinalDetails()
    {
        return $this->belongsToMany('App\OrderDetailsFinal'); 
    }
}
