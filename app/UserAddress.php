<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_user_addresses';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */

    protected $fillable = ['user_id','address_type','first_name','last_name','company_name',
    'street','house_no','zip_code', 'addition', 'city', 'created_at', 'updated_at',
    'deleted_at','state','default'];
}
 