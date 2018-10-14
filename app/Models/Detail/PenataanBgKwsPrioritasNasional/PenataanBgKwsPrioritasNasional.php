<?php
namespace App\Models\Detail\PenataanBgKwsPrioritasNasional;

use App\Models\BaseModel;

class PenataanBgKwsPrioritasNasional extends BaseModel
{
    protected $table = 'tbl_detail_penataan_bg_kws_prioritas_nasional';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
