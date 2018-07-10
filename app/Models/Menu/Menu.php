<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    public function childs() 
    {
        return $this->hasMany('App\Models\Menu\Menu','parent_id','id') ;
   	}

   	public function parent() 
    {
        return $this->hasOne('App\Models\Menu\Menu', 'id', 'parent_id');
    }

   	public function permissions()
    {
        return $this->hasMany('App\Models\Permission\Permission','menu_id','id');
    }
}
