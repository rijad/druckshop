<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Latest extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_latest';

    protected $fillable = [
        'title_english', 'title_german', 'text_english', 'text_german', 'image', 'status', 
    ];
}
