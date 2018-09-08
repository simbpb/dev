<?php
namespace App\Models\Detail\Rtbl;

use App\Models\BaseModel;

class Rtbl extends BaseModel
{
    protected $table = 'tbl_detail_rtbl';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
