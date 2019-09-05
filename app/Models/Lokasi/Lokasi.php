<?php

namespace App\Models\Lokasi;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'master_tabel_prov_kab_kec_kel';

    public function getLokasiPropinsiAttribute($value) {
  		return sprintf("%02d", $value);
	}

	public function getLokasiKabupatenkotaAttribute($value) {
  		return sprintf("%02d", $value);
	}
}
