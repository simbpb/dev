<?php
namespace App\Models\Detail\BgMitigasiBencana;

use App\Models\BaseModel;

class BgMitigasiBencana extends BaseModel
{
    protected $table = 'tbl_detail_bg_mitigasi_bencana';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
