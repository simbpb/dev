<?php
namespace App\Models\Detail\EcoDistrict;

use App\Models\BaseModel;

class EcoDistrict extends BaseModel
{
    protected $table = 'tbl_detail_eco_district';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
