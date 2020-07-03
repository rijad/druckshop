<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPermissions extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ps_user_permissions';
    
    protected $fillable = ['user_id', 'user_name', 'user_role', 'permissions', 'created_at', 
    'updated_at','deleted_at'];

    public function roles()
    {
        return $this->belongsTo('App\UsersAdmin', 'user_id');
    }
}
