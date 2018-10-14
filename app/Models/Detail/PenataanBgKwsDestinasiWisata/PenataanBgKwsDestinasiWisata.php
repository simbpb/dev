<?php
namespace App\Models\Detail\PenataanBgKwsDestinasiWisata;

use App\Models\BaseModel;

class PenataanBgKwsDestinasiWisata extends BaseModel
{
    protected $table = 'tbl_detail_penataan_bg_kws_destinasi_wisata';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
