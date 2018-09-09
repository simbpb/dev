<?php
namespace App\Models\Detail\RgTerbukapublik;

use App\Models\BaseModel;

class RgTerbukapublik extends BaseModel
{
    protected $table = 'tbl_detail_rg_terbukapublik';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
