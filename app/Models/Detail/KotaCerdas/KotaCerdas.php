<?php
namespace App\Models\Detail\KotaCerdas;

use App\Models\BaseModel;

class KotaCerdas extends BaseModel
{
    protected $table = 'tbl_detail_kota_cerdas';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
