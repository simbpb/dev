<?php

namespace App\Http\Controllers\Faq;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqBgMitigasiBencana\FaqBgMitigasiBencanaRepository;

class FaqBgMitigasiBencanaController extends Controller {

    protected $model;
    protected $view;

    public function __construct(
        FaqBgMitigasiBencanaRepository $model
    ) {
        $this->model = $model;
        $this->view = 'faq-bg-mitigasi-bencana';
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }
        $path = $this->view;

        return view('faqs.'.$this->view.'.index', compact('path','programId'));
    }
    
}

