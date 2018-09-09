<?php
namespace App\Models\Detail\KwsLingkstrategis;

use App\Models\BaseModel;

class KwsLingkstrategis extends BaseModel
{
    protected $table = 'tbl_detail_kws_lingkstrategis';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
