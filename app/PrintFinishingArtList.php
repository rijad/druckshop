<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintFinishingArtList extends Model
{
   protected $table = 'ps_print_finishing_art_list';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['print_finishing_id', 'art_list_id', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psProductAttribute()
    {
    	return $this->belongsToMany('App\ProductAttributeRelationship');
    }
}
 