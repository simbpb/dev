<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Master\SubOutput\SubOutputRepository;
use App\Models\Master\Sasaran\SasaranRepository;
use App\Models\Master\Volume\VolumeRepository;
use App\Http\Controllers\Controller;

class MasterController extends Controller {
    
    protected $suboutput;
    protected $sasaran;
    protected $volume;

    public function __construct(
        SubOutputRepository $suboutput,
        SasaranRepository $sasaran,
        VolumeRepository $volume
    ) {
        $this->suboutput = $suboutput;
        $this->sasaran = $sasaran;
        $this->volume = $volume;
    }
    
    public function suboutput($outputId)
    {
        $rows = $this->suboutput->getAjaxOptions($outputId);
        return $rows;
    }

    public function sasaran($suboutputId)
    {
        $rows = $this->sasaran->getAjaxOptions($suboutputId);
        return $rows;
    }

    public function volume($outputId)
    {
        $rows = $this->volume->getAjaxOptions($outputId);
        return $rows;
    }
}

