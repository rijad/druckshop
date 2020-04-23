<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreeSample extends Model
{
    protected $table = 'ps_free_smaple';

    protected $fillable = ['side_option', 'paper_weight', 'last_name', 'first_name', 'company', 
    'street', 'house_number', 'addition_to_address', 'zip_code', 'city', 'document',
    'sample_status', 'status','order_id', 'created_at', 'updated_at', 'deleted_at'];
}
