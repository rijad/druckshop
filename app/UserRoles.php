<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRoles extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_roles';
    
    protected $fillable = ['role', 'created_at', 'updated_at','deleted_at'];
}
