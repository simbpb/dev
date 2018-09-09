<?php
namespace App\Models\Detail\Bgh;

use App\Models\BaseModel;

class Bgh extends BaseModel
{
    protected $table = 'tbl_detail_bgh';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
