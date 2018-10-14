<?php
namespace App\Models\Detail\TabgCb;

use App\Models\BaseModel;

class TabgCb extends BaseModel
{
    protected $table = 'tbl_detail_tabg_cb';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
