<?php
namespace App\Models\Detail\KwsDpn;

use App\Models\BaseModel;

class KwsDpn extends BaseModel
{
    protected $table = 'tbl_detail_kws_dpn';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
