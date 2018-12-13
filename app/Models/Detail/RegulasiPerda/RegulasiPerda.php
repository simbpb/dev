<?php
namespace App\Models\Detail\RegulasiPerda;

use App\Models\BaseModel;
use App\Models\Lokasi\Lokasi;

class RegulasiPerda extends BaseModel
{
    protected $table = 'tbl_detail_regulasi_perda';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}

   	public function getPropinsiIdAttribute($value) {
  		return Lokasi::where('lokasi_nama',$this->nama_propinsi)->first()->lokasi_propinsi;
	}

	public function getKotaIdAttribute($value) {
  		return Lokasi::where('lokasi_nama',$this->nama_kabupatenkota)->first()->lokasi_kabupatenkota;
	}
}
