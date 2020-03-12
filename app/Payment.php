<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $payment_type
 * @property string $type
 * @property int $amount
 * @property boolean $status
 * @property string $ship_date
 * @property integer $shipper_id
 * @property string $created_at
 * @property string $modified_at
 * @property User $user
 * @property PsProduct $psProduct
 * @property PsOrder $psOrder
 */
class Payment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */ 
    protected $table = 'ps_payment';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'product_id', 'user_id', 'payment_type', 'type', 'amount', 'status', 'ship_date', 'shipper_id', 'txn','created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psProduct()
    {
        return $this->belongsTo('App\PsProduct', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psOrder()
    {
        return $this->belongsTo('App\PsOrder', 'order_id');
    }
}
