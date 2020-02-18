<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBackSheet extends Model
{
    protected $table = 'ps_product_back_cover';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'back_cover_id', 'created_at', 'modified_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psCoverSheet()
    {
    	return $this->belongsToMany('App\BackCovers');
    }
}
 