<?php
namespace App\Models\Detail\PenataanBgKwsRawanBencana;

use App\Models\BaseModel;

class PenataanBgKwsRawanBencana extends BaseModel
{
    protected $table = 'tbl_detail_penataan_bg_kws_rawan_bencana';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
