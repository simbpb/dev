<?php
namespace App\Models\Detail\PengelolaTeknisBersertifikasi;

use App\Models\BaseModel;

class PengelolaTeknisBersertifikasi extends BaseModel
{
    protected $table = 'tbl_detail_pengelola_teknis_bersertifikasi';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
