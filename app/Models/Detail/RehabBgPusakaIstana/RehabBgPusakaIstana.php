<?php
namespace App\Models\Detail\RehabBgPusakaIstana;

use App\Models\BaseModel;

class RehabBgPusakaIstana extends BaseModel
{
    protected $table = 'tbl_detail_rehab_bg_pusaka_istana';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
