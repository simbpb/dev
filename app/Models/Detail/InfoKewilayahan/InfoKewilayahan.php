<?php
namespace App\Models\Detail\InfoKewilayahan;

use App\Models\BaseModel;

class InfoKewilayahan extends BaseModel
{
    protected $table = 'tbl_detail_info_kewilayahan';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
