<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */ 
    protected $table = 'ps_product_attributes';

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

    public function psProduct()
    {
        return $this->belongsToMany('App\Product', 'ps_product_attribute_realationship','attribute_id','product_id');
    }
}
 