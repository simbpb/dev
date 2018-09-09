<?php
namespace App\Models\Detail\BgImb;

use App\Models\BaseModel;

class BgImb extends BaseModel
{
    protected $table = 'tbl_detail_bg_imb';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
