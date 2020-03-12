<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderAttributes extends Model
{
   protected $table = 'ps_order_attributes';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
 
    /**
     * @var array
     */
    protected $fillable = ['user_id','status', 'attribute', 'value', 'created_at', 'modified_at'];


    public function psUsers()
    {
        return $this->belongsToMany('App\User'); 
    }
}
 