<?php
namespace App\Models\Detail\AsianGames;

use App\Models\BaseModel;

class AsianGames extends BaseModel
{
    protected $table = 'tbl_detail_asian_games';

    public function lokasi() 
   	{
      	return $this->hasOne('App\Models\Lokasi\Lokasi','lokasi_kode','lokasi_kode') ;
   	}
}
