<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CdCoverPrice extends Model
{
    /** 
     * The table associated with the model.
     *  
     * @var string
     */ 
    protected $table = 'ps_cd_cover_price'; 

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array 
     */
    protected $fillable = ['cover','price'];
}
