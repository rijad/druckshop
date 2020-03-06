<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageOptions extends Model
{ 
     /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_page_options';

    /** 
     * The "type" of the auto-incrementing ID.
     *  
     * @var string 
     */ 
    protected $keyType = 'integer'; 
 
    /** 
     * @var array    
     */ 
    protected $fillable = ['page_options', 'surname', 'name_english', 'name_german', 'status', 'created_at', 'modified_at'];

    public function psPaperWeight() 
    {
        return $this->belongsToMany('App\PaperWeight','ps_page_options_paper_weight','page_option_id','paper_weight_id');
    }


     public function psPageOptionAttribute() 
    { 
        return $this->belongsToMany('App\PageOptionsAttributes','ps_page_options_attribute_realationship','page_option_id','attribute_id');
    }

    public function psMirror()
    {
        return $this->belongsToMany('App\Mirror','ps_page_options_mirror','page_option_id','paper_mirror_id');
    }
}
 