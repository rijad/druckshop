<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_about';

    protected $fillable = [
        'title_english', 'title_german', 'text_english', 'text_german', 'image', 'status', 
    ];
}
