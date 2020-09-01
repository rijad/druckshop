<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $order_id
 * @property integer $user_id
 * @property string $house_no
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 * @property boolean $same_as_billing 
 * @property string $created_at
 * @property string $modified_at
 * @property User $user
 * @property PsOrder $psOrder
 */
class ShippingAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_shipping_address';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['order_id', 'user_id', 'house_no', 'street_address', 'city', 'state', 
    'postal_code', 'country', 'same_as_billing', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function psOrder()
    {
        return $this->belongsTo('App\PsOrder', 'order_id');
    }
}
