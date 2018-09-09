<?php
namespace App\Models\Detail\BgSlfke1;

use App\Models\BaseModel;

class BgSlfke1 extends BaseModel
{
    protected $table = 'tbl_detail_bg_slfke1';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
