<?php
namespace App\Models\VisiMisi;

use DB;
use Auth;

class VisiMisiRepository
{

    protected $model;
      
    public function __construct(VisiMisi $model) {
        $this->model = $model;
    }

    public function getOptions() {
        $options = [];
        return $options;
    }
}