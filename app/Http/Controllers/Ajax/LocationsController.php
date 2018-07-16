<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Lokasi\LokasiRepository;
use App\Http\Controllers\Controller;

class LocationsController extends Controller {
    
    protected $model;

    public function __construct(
        LokasiRepository $lokasi
    ) {
        $this->model = $lokasi;
    }
    
    public function cities($provinceId)
    {
        $rows = $this->model->getCitiesOptions($provinceId);
        return $rows;
    }
}

