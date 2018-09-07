<?php
namespace App\Models\Detail\KwsRawanBencana;

use App\Models\BaseModel;

class KwsRawanBencana extends BaseModel
{
    protected $table = 'tbl_detail_kws_rawan_bencana';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
