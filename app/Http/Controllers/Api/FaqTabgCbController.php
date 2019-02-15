<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqTabgCb\FaqTabgCbRepository;

class FaqTabgCbController extends Controller {

    protected $model;

    public function __construct(
        FaqTabgCbRepository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }    
}

