<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtList extends Model
{
   /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_art_list';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['check_list', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'updated_at', 'deleted_at'];

}
