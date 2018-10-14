<?php
namespace App\Models\Detail\PengembanganKotaHijau;

use App\Models\BaseModel;

class PengembanganKotaHijau extends BaseModel
{
    protected $table = 'tbl_detail_pengembangan_kota_hijau';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
