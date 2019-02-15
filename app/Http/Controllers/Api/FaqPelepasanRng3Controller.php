<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqPelepasanRng3\FaqPelepasanRng3Repository;

class FaqPelepasanRng3Controller extends Controller {

    protected $model;

    public function __construct(
        FaqPelepasanRng3Repository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }
}

