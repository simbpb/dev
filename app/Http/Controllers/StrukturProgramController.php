<?php

namespace App\Http\Controllers;

use JsValidator;
use Validator;
use Illuminate\Http\Request;
use App\Models\StrukturBpb\StrukturBpbRepository;
use App\Models\StrukturBpb\StrukturBpbTransformer;

class StrukturProgramController extends Controller
{

    protected $model;

    public function __construct(StrukturBpbRepository $strukturBpb) {
        $this->model = $strukturBpb;
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->model->list($request->all());
            return (new StrukturBpbTransformer)->transformPaginate($users);
        }
        return view('struktur_program.index');
    }

    
}
