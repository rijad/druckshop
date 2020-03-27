<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class ProductPaperWeight extends Model
{
    protected $table = 'ps_product_paper_weight';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'paper_weight_id', 'min_sheets','max_sheets','created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
} 
