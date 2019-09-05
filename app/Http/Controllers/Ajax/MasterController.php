<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Master\SubOutput\SubOutputRepository;
use App\Models\Master\Sasaran\SasaranRepository;
use App\Models\Master\Volume\VolumeRepository;
use App\Models\Master\Aktivitas\AktivitasRepository;
use App\Models\Tupoksi\TupoksiRepository;
use App\Http\Controllers\Controller;

class MasterController extends Controller {
    
    protected $suboutput;
    protected $sasaran;
    protected $volume;
    protected $tupoksi;
    protected $aktivitas;

    public function __construct(
        SubOutputRepository $suboutput,
        SasaranRepository $sasaran,
        VolumeRepository $volume,
        TupoksiRepository $tupoksi,
        AktivitasRepository $aktivitas
    ) {
        $this->suboutput = $suboutput;
        $this->sasaran = $sasaran;
        $this->volume = $volume;
        $this->tupoksi = $tupoksi;
        $this->aktivitas = $aktivitas;
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

    public function tupoksi($subditId)
    {
        $rows = $this->tupoksi->getAjaxOptions($subditId);
        return $rows;
    }

    public function aktivitas1($komponenId)
    {
        $rows = $this->aktivitas->getAjaxOptionsAkt1($komponenId);
        return $rows;
    }

    public function aktivitas2($komponenId)
    {
        $rows = $this->aktivitas->getAjaxOptionsAkt2($komponenId);
        return $rows;
    }

    public function aktivitas3($komponenId)
    {
        $rows = $this->aktivitas->getAjaxOptionsAkt3($komponenId);
        return $rows;
    }

    public function aktivitas4($komponenId)
    {
        $rows = $this->aktivitas->getAjaxOptionsAkt4($komponenId);
        return $rows;
    }
}

