<?php

namespace App\Http\Controllers\Faq;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqAsianGames\FaqAsianGamesRepository;

class FaqAsianGamesController extends Controller {

    protected $model;
    protected $view;

    public function __construct(
        FaqAsianGamesRepository $model
    ) {
        $this->model = $model;
        $this->view = 'faq-asian-games';
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

