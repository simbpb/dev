<?php
namespace App\Models\Detail\Bantek;

use App\Models\BaseModel;

class Bantek extends BaseModel
{
    protected $table = 'tbl_detail_bantek';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
