<?php

namespace App\Http\Controllers\Ajax;

use App\Models\Master\Uraian\UraianRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UraianController extends Controller {
    
    protected $uraian;

    public function __construct(
        UraianRepository $uraian
    ) {
        $this->uraian = $uraian;
    }
    
    public function detail_uraian(Request $request)
    {
        $detail = $this->uraian->getDetailUraian($request);
        return $detail;
    }
}

