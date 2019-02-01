<?php

namespace App\Models\InfoWilayah;

use Illuminate\Database\Eloquent\Model;

class InfoWilayah extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'sk';
    protected $table = 'dim_info_wilayah';
}
