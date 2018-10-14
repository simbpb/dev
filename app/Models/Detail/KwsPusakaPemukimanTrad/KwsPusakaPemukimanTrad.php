<?php
namespace App\Models\Detail\KwsPusakaPemukimanTrad;

use App\Models\BaseModel;

class KwsPusakaPemukimanTrad extends BaseModel
{
    protected $table = 'tbl_detail_kws_pusaka_pemukiman_trad';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
