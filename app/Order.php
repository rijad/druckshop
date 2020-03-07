<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property string $surname
 * @property string $order_number
 * @property string $ship_date
 * @property string $shipper_id
 * @property string $order_date
 * @property integer $payment_id
 * @property int $amount
 * @property boolean $status 
 * @property string $priority
 * @property string $assigned_to
 * @property string $transaction_id
 * @property string $created_at
 * @property string $modified_at
 * @property User $user
 * @property PsProduct $psProduct
 * @property PsPayment[] $psPayments
 * @property PsShippingAddress[] $psShippingAddresses
 */
class Order extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_order';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'surname', 'order_number', 'ship_date', 'shipper_id', 'order_date', 'payment_id', 'amount', 'status', 'priority', 'assigned_to', 'transaction_id', 'created_at', 'modified_at'];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psPayments()
    {
        return $this->hasMany('App\PsPayment', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psShippingAddresses()
    {
        return $this->hasMany('App\PsShippingAddress', 'order_id');
    }
}
