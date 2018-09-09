<?php
namespace App\Models\Detail\Plbn;

use App\Models\BaseModel;

class Plbn extends BaseModel
{
    protected $table = 'tbl_detail_plbn';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
