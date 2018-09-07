<?php
namespace App\Models\Detail\KebunRaya;

use App\Models\BaseModel;

class KebunRaya extends BaseModel
{
    protected $table = 'tbl_detail_kebun_raya';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
