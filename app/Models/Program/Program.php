<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'tbl_program';

    public function renstra()
    {
        return $this->hasOne('App\Models\Renstra\Renstra','id','renstra_id');
    }

    public function output()
    {
        return $this->hasOne('App\Models\Master\Output\Output','id','output_id');
    }

    public function suboutput()
    {
        return $this->hasOne('App\Models\Master\SubOutput\SubOutput','id','suboutput_id');
    }

    public function sasaran()
    {
        return $this->hasOne('App\Models\Master\Sasaran\Sasaran','id','sasaran_id');
    }

    public function volume()
    {
        return $this->hasOne('App\Models\Master\Volume\Volume','id','volume_id');
    }
}
