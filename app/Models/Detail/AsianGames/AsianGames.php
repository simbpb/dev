<?php
namespace App\Models\Detail\AsianGames;

use App\Models\BaseModel;
use App\Models\Lokasi\Lokasi;

class AsianGames extends BaseModel
{
    protected $table = 'tbl_detail_asian_games';

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
