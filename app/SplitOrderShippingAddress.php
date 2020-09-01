<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SplitOrderShippingAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_split_order_shipping_addresses'; 

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */

    protected $fillable = ['unique_id','user_id','prod_sequence','sequence','no_of_copies','no_of_cds','shipping_address','shipping_company', 'created_at', 'updated_at','deleted_at','status'];

}
 