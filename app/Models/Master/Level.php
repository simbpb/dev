<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	public $primaryKey = 'id_level';
    protected $table = 'master_level';

    public function getIdLevelAttribute($value) {
  		return sprintf("%03d", $value);
	}
}
