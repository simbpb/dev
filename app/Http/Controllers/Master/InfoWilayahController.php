<?php
namespace App\Http\Controllers\Master;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\InfoWilayah\InfoWilayahRepository;
use App\Http\Controllers\Controller;

class InfoWilayahController extends Controller {
    
    protected $model;

    public function __construct(
        InfoWilayahRepository $infowilayah
    ) {
        $this->model = $infowilayah;
    }
    
    protected function validationRules() {
        $rule['nama_propinsi'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('info-wilayah.index');
    }

    public function edit($id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/info-wilayah'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);

        return view('info-wilayah.form', compact('model','validator'));
    }

}

