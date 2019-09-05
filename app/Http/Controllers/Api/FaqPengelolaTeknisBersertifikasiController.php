<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqPengelolaTeknisBersertifikasi\FaqPengelolaTeknisBersertifikasiRepository;

class FaqPengelolaTeknisBersertifikasiController extends Controller {

    protected $model;

    public function __construct(
        FaqPengelolaTeknisBersertifikasiRepository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }
}

