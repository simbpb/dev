<?php
namespace App\Models\IntegrasiRnRekapKemen;

use App\Models\BaseModel;
use App\Models\Lokasi\Lokasi;

class IntegrasiRnRekapKemen extends BaseModel
{
    protected $table = 'integrasi_rn_rekap_kemen';

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
