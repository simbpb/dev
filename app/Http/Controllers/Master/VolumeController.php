<?php
namespace App\Http\Controllers\Master;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Models\Master\Volume\VolumeRepository;
use App\Models\Master\Output\OutputRepository;
use App\Http\Controllers\Controller;

class VolumeController extends Controller {
    
    protected $model;
    protected $output;

    public function __construct(
        VolumeRepository $volume,
        OutputRepository $output
    ) {
        $this->model = $volume;
        $this->output = $output;
    }
    
    protected function validationRules() {
        $rule['master'] = 'required';
        $rule['output_id'] = 'required';
        $rule['jenis_volume'] = 'required';
        return $rule;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }

        return view('volume.index');
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
                return redirect(Navigation::adminUrl('/volume'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $output = $this->output->getOptions();
        $validator = JsValidator::make($this->validationRules());

        return view('volume.form', compact('output','validator'));
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
                return redirect(Navigation::adminUrl('/volume'));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $output = $this->output->getOptions();
        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);

        return view('volume.form', compact('model','output','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        return view('volume.view', compact('model'));
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

