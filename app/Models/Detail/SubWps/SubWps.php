<?php
namespace App\Models\Detail\SubWps;

use App\Models\BaseModel;

class SubWps extends BaseModel
{
    protected $table = 'tbl_detail_sub_wps';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
