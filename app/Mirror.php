<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mirror extends Model 
{
    /**
     * The table associated with the model.
     * 
     * @var string 
     */
    protected $table = 'ps_mirror';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['mirror', 'surname', 'name_english', 'name_german','status', 
    'created_at', 'updated_at', 'deleted_at'];

    public function psPageOption()
    {
        return $this->belongsToMany('App\PageOptions', 'ps_page_options_mirror','paper_mirror_id','page_option_id');
    }
}
 