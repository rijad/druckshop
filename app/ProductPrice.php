<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_product_price';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [
        'ps_product_id', 'min_range', 'max_range', 'price', 'status', 'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psPaperWeight()
    {
        return $this->belongsTo('App\PsPaperWeight', 'paper_weight_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psDeliveryService()
    {
        return $this->belongsTo('App\PsDeliveryService', 'delivery_service_id');
    }
}
