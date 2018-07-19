<?php
namespace App\Http\Controllers\Master;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Master\Output\OutputRepository;
use App\Http\Controllers\Controller;

class OutputController extends Controller {
    
    protected $model;

    public function __construct(
        OutputRepository $output
    ) {
        $this->model = $output;
    }
    
    protected function validationRules() {
        $rule['nama_output'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('output.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->create($request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/output'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }
        $validator = JsValidator::make($this->validationRules());

        return view('output.form', compact('validator'));
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
                return redirect(Navigation::adminUrl('/output'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);

        return view('output.form', compact('model','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('output.view', compact('model'));
    }

    public function delete($id) 
    {
        try {
            session()->flash('success', 'Data berhasil dihapus');
            $result['success'] = $this->model->destroy($id);
        } catch (\Exception $e) {
            session()->flash('danger', $e->getMessage());
            $result['success'] = false;
        }

        return response()->json($result);
    }
}

