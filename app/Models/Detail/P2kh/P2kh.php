<?php
namespace App\Models\Detail\P2kh;

use App\Models\BaseModel;

class P2kh extends BaseModel
{
    protected $table = 'tbl_detail_p2kh';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
