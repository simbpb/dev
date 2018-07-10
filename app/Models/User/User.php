<?php

namespace App\Models\User;

use App\Enum\Access;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne('App\Models\Role\Role','id','role_id');
    }

    public function isDeveloper() 
    {
        return ($this->id == Access::DEVELOPER) ? true : false;
    }

    public function hasPermission($permission)
    {
        if ($this->role->permissions->where('name', $permission)->first()) {
            return true;
        }
        return false;
    }
}
