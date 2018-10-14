<?php
namespace App\Models\Detail\RevolusiMental;

use App\Models\BaseModel;

class RevolusiMental extends BaseModel
{
    protected $table = 'tbl_detail_revolusi_mental';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
