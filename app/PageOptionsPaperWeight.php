<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageOptionsPaperWeight extends Model
{
    protected $table = 'ps_page_options_paper_weight';

    /** 
     * The "type" of the auto-incrementing ID.
     *  
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['page_option_id', 'paper_weight_id', 'created_at', 'updated_at', 'deleted_at'];

    public function psPageOptions()
    {
    	return $this->belongsToMany('App\PageOptions');
    }
    public function psPaperWeight()
    {
    	return $this->belongsToMany('App\PaperWeight');
    }
}
