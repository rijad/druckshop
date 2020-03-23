<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'ps_gallery';

    protected $fillable = ['image', 'status', 'created_at', 'updated_at', 'deleted_at'];
}
