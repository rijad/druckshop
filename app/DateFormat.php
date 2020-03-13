<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateFormat extends Model
{
   /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_date_format';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['date_format', 'surname', 'name_english', 'name_german', 'status', 
    'created_at', 'updated_at', 'deleted_at'];
}
