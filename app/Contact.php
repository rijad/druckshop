<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_contact';

    protected $fillable = [
        'email', 'address_english', 'address_german', 'text_english', 'text_german', 'location', 
        'contact', 'status', 
    ];
}
