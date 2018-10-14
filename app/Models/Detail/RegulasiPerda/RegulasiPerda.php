<?php
namespace App\Models\Detail\RegulasiPerda;

use App\Models\BaseModel;

class RegulasiPerda extends BaseModel
{
    protected $table = 'tbl_detail_regulasi_perda';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
