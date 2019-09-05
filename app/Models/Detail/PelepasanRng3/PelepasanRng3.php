<?php
namespace App\Models\Detail\PelepasanRng3;

use App\Models\BaseModel;
use App\Models\Lokasi\Lokasi;

class PelepasanRng3 extends BaseModel
{
    protected $table = 'tbl_detail_pelepasan_rng3';

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
