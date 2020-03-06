<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageOptionMirror extends Model
{
    protected $table = 'ps_page_options_mirror';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['page_option_id', 'paper_mirror_id', 'created_at', 'modified_at'];

   public function psPageOption()
    {
        return $this->belongsToMany('App\PageOptions');
    }

    public function psMirror()
    {
    	return $this->belongsToMany('App\Mirror');
    }
} 
