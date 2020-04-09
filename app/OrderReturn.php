<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReturn extends Model
{
    protected $table = 'ps_order_return';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
 
    /**
     * @var array
     */
    protected $fillable = ['id','user_id','order_id','image_path','return_desc','status', 'created_at', 
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
 