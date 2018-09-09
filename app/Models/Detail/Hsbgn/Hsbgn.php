<?php
namespace App\Models\Detail\Hsbgn;

use App\Models\BaseModel;

class Hsbgn extends BaseModel
{
    protected $table = 'tbl_detail_hsbgn';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
