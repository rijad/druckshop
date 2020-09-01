<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintoutPaperSurcharge extends Model
{
    /** 
     * The table associated with the model.
     *  
     * @var string
     */ 
    protected $table = 'ps_printout_paper_surcharge'; 

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array 
     */
    protected $fillable = ['din','papier','sided','price'];
}
