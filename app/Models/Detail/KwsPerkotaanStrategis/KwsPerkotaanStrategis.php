<?php
namespace App\Models\Detail\KwsPerkotaanStrategis;

use App\Models\BaseModel;

class KwsPerkotaanStrategis extends BaseModel
{
    protected $table = 'tbl_detail_kws_perkotaan_strategis';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
