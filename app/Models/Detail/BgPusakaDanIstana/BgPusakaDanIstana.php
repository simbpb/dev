<?php
namespace App\Models\Detail\BgPusakaDanIstana;

use App\Models\BaseModel;

class BgPusakaDanIstana extends BaseModel
{
    protected $table = 'tbl_detail_bg_pusaka_dan_istana';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
