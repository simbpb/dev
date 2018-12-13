<?php
namespace App\Models\Detail\AssetCagarBudaya;

use App\Models\BaseModel;
use App\Models\Lokasi\Lokasi;

class AssetCagarBudaya extends BaseModel
{
    protected $table = 'tbl_detail_asset_cagar_budaya';

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
