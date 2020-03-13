<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_id
 * @property string $house_no
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 * @property boolean $same_as_shipping
 * @property string $created_at
 * @property string $modified_at
 */
class BillingAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_billing_address';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'order_id', 'house_no', 'street_address', 'city', 'state', 'postal_code', 'country', 'same_as_shipping', 'created_at', 'updated_at', 'deleted_at'];

}
