<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $image_path
 * @property string $created_at
 * @property string $modified_at
 * @property PsProduct $psProduct
 */
class ProductImage extends Model
{ 
    /**
     * The table associated with the model.
     * 
     * @var string 
     */
    protected $table = 'ps_product_image';

    /**
     * The "type" of the auto-incrementing ID. 
     * 
     * @var string
     */
    protected $keyType = 'integer'; 

    /**
     * @var array 
     */
    protected $fillable = ['product_id', 'image_path', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psProduct()
    {
        return $this->belongsTo('App\PsProduct', 'product_id');
    }
}