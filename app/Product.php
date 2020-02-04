<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $short_description
 * @property string $description
 * @property string $created_at
 * @property string $modified_at
 * @property PsOrder[] $psOrders
 * @property PsPayment[] $psPayments
 * @property PsProductImage[] $psProductImages
 */
class Product extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_product';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'short_description', 'description', 'created_at', 'modified_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psOrders()
    {
        return $this->hasMany('App\PsOrder', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psPayments()
    {
        return $this->hasMany('App\PsPayment', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function psProductImages()
    {
        return $this->hasMany('App\PsProductImage', 'product_id');
    }
}
