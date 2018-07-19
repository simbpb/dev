<?php

namespace App\Models\Permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu\Menu', 'menu_id', 'id');
    }
}
