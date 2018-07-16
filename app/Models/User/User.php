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

    public function province()
    {
        return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_propinsi','province_id');
    }

    public function provinceDetail()
    {
        return $this->province()->where('lokasi_kabupatenkota','00');
    }

    public function city()
    {
        return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kabupatenkota','city_id');
    }

    public function cityDetail()
    {
        return $this->city()->where('lokasi_propinsi', $this->province_id)
                        ->where('lokasi_kecamatan','00');
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
