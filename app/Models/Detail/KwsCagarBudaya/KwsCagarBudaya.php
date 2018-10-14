<?php
namespace App\Models\Detail\KwsCagarBudaya;

use App\Models\BaseModel;

class KwsCagarBudaya extends BaseModel
{
    protected $table = 'tbl_detail_kws_cagar_budaya';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
