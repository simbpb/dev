<?php
namespace App\Models\Detail\Wps;

use App\Models\BaseModel;

class Wps extends BaseModel
{
    protected $table = 'tbl_detail_wps';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
