<?php

namespace App\Http\Controllers\Faq;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqPelepasanRng3\FaqPelepasanRng3Repository;

class FaqPelepasanRng3Controller extends Controller {

    protected $model;
    protected $view;

    public function __construct(
        FaqPelepasanRng3Repository $model
    ) {
        $this->model = $model;
        $this->view = 'faq-pelepasan-rng-3';
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }
        $path = $this->view;

        return view('faqs.'.$this->view.'.index', compact('path'));
    }

    public function modal($lokasiKode, Request $request) {
        if ($request->get('act') == 'ajax') {
            $model = $this->model->listByLokasi($lokasiKode, $request->all());
            return $model;
        }
        $path = $this->view;

        return view('faqs.'.$this->view.'.modal', compact('path','lokasiKode'));
    }
    
}

