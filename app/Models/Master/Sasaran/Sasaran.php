<?php

namespace App\Models\Master\Sasaran;

use Illuminate\Database\Eloquent\Model;

class Sasaran extends Model
{
    protected $table = 'master_sasaran';

    public function output() 
   	{
      	return $this->hasOne('App\Models\Master\Output\Output','id','output_id') ;
   	}

   	public function suboutput() 
   	{
      	return $this->hasOne('App\Models\Master\SubOutput\SubOutput','id','suboutput_id') ;
   	}
}
