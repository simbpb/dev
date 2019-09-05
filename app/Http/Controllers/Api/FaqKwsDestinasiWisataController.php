<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqKwsDestinasiWisata\FaqKwsDestinasiWisataRepository;

class FaqKwsDestinasiWisataController extends Controller {

    protected $model;

    public function __construct(
        FaqKwsDestinasiWisataRepository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }
}

