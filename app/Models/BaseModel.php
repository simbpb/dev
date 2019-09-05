<?php
namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model{
   
    public static function boot()
    {
        parent::boot();
        static::creating(function($model)
        {
            $user = Auth::user();           
            $model->created_by = $user->fullname;
            $model->updated_by = $user->fullname;
        });
        static::updating(function($model)
        {
            $user = Auth::user();
            $model->updated_by = $user->fullname;
        });       
    }
}