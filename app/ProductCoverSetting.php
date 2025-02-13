<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCoverSetting extends Model
{
    protected $table = 'ps_product_cover_setting';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['ps_product_id', 'ps_cover_setting_id', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psPageFormat()
    {
    	return $this->belongsToMany('App\ProductPageFormat');
    }
}
