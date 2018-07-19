<?php

namespace App\Models\Master\SubOutput;

use Illuminate\Database\Eloquent\Model;

class SubOutput extends Model
{
    protected $table = 'master_suboutput';

    public function output() 
   	{
      	return $this->hasOne('App\Models\Master\Output\Output','id','output_id') ;
   	}
}
