<?php

namespace App\Http\Controllers\Faq;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faq\FaqRthStatusTigapuluhpersen\FaqRthStatusTigapuluhpersenRepository;

class FaqRthStatusTigapuluhpersenController extends Controller {

    protected $model;
    protected $view;

    public function __construct(
        FaqRthStatusTigapuluhpersenRepository $model
    ) {
        $this->model = $model;
        $this->view = 'faq-rth-status-tigapuluhpersen';
    }

    protected function validationRules($scope = 'create') {
        return $rule = [];
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }
        $path = $this->view;

        return view('faqs.'.$this->view.'.index', compact('path'));
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules('edit'));
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/faqs/'.$this->view));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules('edit'));
        $model = $this->model->find($id);
        $path = $this->view;

        return view('faqs.'.$this->view.'.form', compact('path','model','validator'));
    }

    public function modal($lokasiKode, Request $request) {
        if ($request->get('act') == 'ajax') {
            $model = $this->model->listByLokasi($lokasiKode, $request->all());
            return $model;
        }
        $path = $this->view;

        return view('faqs.'.$this->view.'.modal', compact('path','lokasiKode'));
    }
    
}

