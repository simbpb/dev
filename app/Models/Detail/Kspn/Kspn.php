<?php
namespace App\Models\Detail\Kspn;

use App\Models\BaseModel;

class Kspn extends BaseModel
{
    protected $table = 'tbl_detail_kspn';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
