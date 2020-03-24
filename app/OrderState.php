<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    protected $table = 'ps_order_state';

    protected $fillable = ['order_state','status', 'created_at', 
    'updated_at', 'deleted_at'];
}
