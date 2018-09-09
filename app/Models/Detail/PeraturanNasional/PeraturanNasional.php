<?php
namespace App\Models\Detail\PeraturanNasional;

use App\Models\BaseModel;

class PeraturanNasional extends BaseModel
{
    protected $table = 'tbl_detail_peraturan_nasional';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
