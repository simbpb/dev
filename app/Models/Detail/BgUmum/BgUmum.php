<?php
namespace App\Models\Detail\BgUmum;

use App\Models\BaseModel;

class BgUmum extends BaseModel
{
    protected $table = 'tbl_detail_bg_umum';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
