<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPageFormat extends Model
{
    protected $table = 'ps_product_page_format';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'paper_format', 'status', 'created_at', 'updated_at', 'deleted_at'];

    public function psProduct()
    {
    	return $this->belongsToMany('App\Product');
    }
    public function psPageFormat()
    {
    	return $this->belongsToMany('App\ProductPageFormat');
    }

    //get page format details
    public function pageFormat() {

        return $this->belongsTo('App\PageFomat', 'paper_format');
    }
}
