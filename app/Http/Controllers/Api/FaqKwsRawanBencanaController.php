<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqKwsRawanBencana\FaqKwsRawanBencanaRepository;

class FaqKwsRawanBencanaController extends Controller {

    protected $model;

    public function __construct(
        FaqKwsRawanBencanaRepository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }
}

