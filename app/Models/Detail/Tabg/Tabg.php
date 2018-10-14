<?php
namespace App\Models\Detail\Tabg;

use App\Models\BaseModel;

class Tabg extends BaseModel
{
    protected $table = 'tbl_detail_tabg';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
