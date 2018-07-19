<?php
namespace App\Http\Controllers\Master;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Master\Sasaran\SasaranRepository;
use App\Models\Master\Output\OutputRepository;
use App\Http\Controllers\Controller;

class SasaranController extends Controller {
    
    protected $model;
    protected $output;

    public function __construct(
        SasaranRepository $sasaran,
        OutputRepository $output
    ) {
        $this->model = $sasaran;
        $this->output = $output;
    }
    
    protected function validationRules() {
        $rule['nama_sasaran'] = 'required';
        $rule['output_id'] = 'required';
        $rule['suboutput_id'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('sasaran.index');
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
                return redirect(Navigation::adminUrl('/sasaran'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $output = $this->output->getOptions();
        $validator = JsValidator::make($this->validationRules());

        return view('sasaran.form', compact('output','validator'));
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
                return redirect(Navigation::adminUrl('/sasaran'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $output = $this->output->getOptions();
        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);

        return view('sasaran.form', compact('model','output','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('sasaran.view', compact('model'));
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

