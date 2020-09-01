<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BindingSampleImage extends Model
{
    protected $table = 'ps_binding_sample_image';

    protected $fillable = ['product_id', 'pageformat_id', 'covercolor_id', 'image', 'status', 
    'created_at', 'updated_at', 'deleted_at'];

}
