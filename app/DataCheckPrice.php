<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataCheckPrice extends Model
{
    /** 
     * The table associated with the model.
     *  
     * @var string
     */ 
    protected $table = 'ps_datacheck_price'; 

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array 
     */
    protected $fillable = ['type','price'];
}
