<?php

namespace App\Http\Controllers\Api;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqRthStatusTigapuluhpersen\FaqRthStatusTigapuluhpersenRepository;

class FaqRthStatusTigapuluhpersenController extends Controller {

    protected $model;

    public function __construct(
        FaqRthStatusTigapuluhpersenRepository $model
    ) {
        $this->model = $model;
    }

    public function index(Request $request) {
        $model = $this->model->list($request->all());
        return $model;
    }
}

