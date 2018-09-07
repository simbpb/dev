<?php
namespace App\Models\Detail\NspkPerdabg;

use App\Models\BaseModel;

class NspkPerdabg extends BaseModel
{
    protected $table = 'tbl_detail_nspk_perdabg';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
