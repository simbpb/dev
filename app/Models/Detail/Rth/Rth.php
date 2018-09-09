<?php
namespace App\Models\Detail\Rth;

use App\Models\BaseModel;

class Rth extends BaseModel
{
    protected $table = 'tbl_detail_rth';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
