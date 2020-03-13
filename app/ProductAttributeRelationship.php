<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeRelationship extends Model
{
   protected $table = 'ps_product_attribute_realationship';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'attribute_id', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psProductAttribute()
    {
    	return $this->belongsToMany('App\ProductAttributeRelationship');
    }
}
 