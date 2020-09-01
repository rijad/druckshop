<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrintFinishing extends Model
{
   protected $table = 'ps_product_print_finishing';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'print_finishing_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psProductAttribute()
    {
    	return $this->belongsToMany('App\ProductAttributeRelationship');
    }
}
 