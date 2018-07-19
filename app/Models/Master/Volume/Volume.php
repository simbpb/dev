<?php

namespace App\Models\Master\Volume;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $table = 'master_volume';

    public function output() 
   	{
      	return $this->hasOne('App\Models\Master\Output\Output','id','output_id') ;
   	}
}
