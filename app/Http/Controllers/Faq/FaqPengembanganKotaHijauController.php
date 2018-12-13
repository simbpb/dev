<?php

namespace App\Http\Controllers\Faq;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqPengembanganKotaHijau\FaqPengembanganKotaHijauRepository;

class FaqPengembanganKotaHijauController extends Controller {

    protected $model;
    protected $view;

    public function __construct(
        FaqPengembanganKotaHijauRepository $model
    ) {
        $this->model = $model;
        $this->view = 'faq-pengembangan-kota-hijau';
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

