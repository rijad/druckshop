<?php

namespace App;  

use Illuminate\Database\Eloquent\Model;

class ProductCoverColor extends Model
{
    protected $table = 'ps_product_cover_color';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'cover_color_id', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psCoverColor()
    {
    	return $this->belongsToMany('App\CoverColor');
    }
}
