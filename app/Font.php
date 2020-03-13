<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Font extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_fonts';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['font', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'updated_at', 'deleted_at'];
}
