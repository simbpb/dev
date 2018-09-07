<?php
namespace App\Models\Detail\P3kp;

use App\Models\BaseModel;

class P3kp extends BaseModel
{
    protected $table = 'tbl_detail_p3kp';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
