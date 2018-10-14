<?php
namespace App\Models\Detail\BgNegara;

use App\Models\BaseModel;

class BgNegara extends BaseModel
{
    protected $table = 'tbl_detail_bg_negara';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
