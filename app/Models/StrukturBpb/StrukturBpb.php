<?php

namespace App\Models\StrukturBpb;

use App\Models\BaseModel;

class StrukturBpb extends BaseModel
{
	protected $primaryKey = 'id_struktur';
    protected $table = 'struktur_bpb';

    public function getIdLevelAttribute($value) {
  		return sprintf("%03d", $value);
	}
}
