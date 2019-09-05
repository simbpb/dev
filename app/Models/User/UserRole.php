<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role\Role;

class UserRole extends Model
{
    protected $table = 'user_has_roles';

    public function role()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
