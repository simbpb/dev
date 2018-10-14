<?php
namespace App\Models\Detail\RthRencanaTigapuluhpersen;

use App\Models\BaseModel;

class RthRencanaTigapuluhpersen extends BaseModel
{
    protected $table = 'tbl_detail_rth_rencana_tigapuluhpersen';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
