<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 
class PageOptionsAttributesRelationship extends Model
{
    protected $table = 'ps_page_options_attribute_realationship';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /** 
     * @var array
     */
    protected $fillable = ['page_option_id', 'attribute_id', 'created_at', 'modified_at'];

    public function psPageOptions()
    {
    	return $this->belongsToMany('App\PageOptions');
    }
    public function psPageOptionsAttribute() 
    {
    	return $this->belongsToMany('App\PageOptionsAttributesRelationship');
    }
}
 