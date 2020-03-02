<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageOptionsAttributes extends Model
{
   /**
     * The table associated with the model.
     *  
     * @var string
     */ 
    protected $table = 'ps_page_options_attributes';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';
  
    /**
     * @var array  
     */
    protected $fillable = ['attribute', 'created_at', 'modified_at'];

    public function psPageOptions() 
    {
        return $this->belongsToMany('App\PageOptions', 'ps_page_options_attribute_realationship','attribute_id','page_option_id');
    }
}
