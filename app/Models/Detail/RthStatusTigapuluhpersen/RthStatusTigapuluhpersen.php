<?php
namespace App\Models\Detail\RthStatusTigapuluhpersen;

use App\Models\BaseModel;

class RthStatusTigapuluhpersen extends BaseModel
{
    protected $table = 'tbl_detail_rth_status_tigapuluhpersen';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
