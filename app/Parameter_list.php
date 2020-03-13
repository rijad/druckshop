<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter_list extends Model
{
    protected $table = 'ps_parameter_list';
    protected $fillable = ['parameter_list', 'status', 'created_at', 'updated_at', 'deleted_at'];
}
