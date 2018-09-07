<?php
namespace App\Models\Detail\PelepasanRng3;

use App\Models\BaseModel;

class PelepasanRng3 extends BaseModel
{
    protected $table = 'tbl_detail_pelepasan_rng3';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
