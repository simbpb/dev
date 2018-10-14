<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\RegulasiPerda\RegulasiPerdaRepository;

class RegulasiPerdaController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        RegulasiPerdaRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'regulasi-perda';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['perda_bg'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_Perdabg'] = 'required';
                        }
$rule['perda_rt_rw'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_RTRW'] = 'required';
                        }
$rule['perda_rd_tr'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_RDTR'] = 'required';
                        }
$rule['perda_cagar_budaya'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerdaCagarBudaya'] = 'required';
                        }
$rule['perda_rth'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerdaRTH'] = 'required';
                        }
$rule['perwal_perbup_bgh'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupBGH'] = 'required';
                        }
$rule['perwal_perbup_imb'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupIMB'] = 'required';
                        }
$rule['perwal_perbup_slf'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupSLF'] = 'required';
                        }
$rule['perwal_perbup_rtbl_1'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_1'] = 'required';
                        }
$rule['perwal_perbup_rtbl_2'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_2'] = 'required';
                        }
$rule['perwal_perbup_rtbl_3'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_3'] = 'required';
                        }
$rule['perwal_perbup_rtbl_4'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_4'] = 'required';
                        }
$rule['perwal_perbup_rtbl_5'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_5'] = 'required';
                        }
$rule['perwal_perbup_rtbl_6'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_PerbupRTBL_6'] = 'required';
                        }

        return $rule;
    }

    public function index($programId, Request $request) {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }
        $path = $this->view;

        return view('details.'.$this->view.'.index', compact('path','programId'));
    }
    
    public function create($programId, Request $request)
    {
        if ($request->isMethod('post')) {
            $validation = Validator::make($request->all(), $this->validationRules());
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->create($request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/details/'.$this->view.'/'.$programId));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $provinces = $this->lokasi->getTextProvincesOptions();
        $validator = JsValidator::make($this->validationRules());
        $path = $this->view;

        return view('details.'.$this->view.'.form', compact('path','programId','provinces','validator'));
    }

    public function edit($programId, $id, Request $request)
    {
        if ($request->isMethod('post')) {

            $validation = Validator::make($request->all(), $this->validationRules('edit'));
            if ($validation->fails()) {
                return redirect()->back()->withInput()->withErrors($validation->errors());
            }

            try {
                $this->model->update($id, $request);
                session()->flash('success', 'Data berhasil disimpan');
                return redirect(Navigation::adminUrl('/details/'.$this->view.'/'.$programId));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $provinces = $this->lokasi->getProvincesOptions();
        $validator = JsValidator::make($this->validationRules('edit'));
        $model = $this->model->find($id);
        $path = $this->view;

        return view('details.'.$this->view.'.form', compact('path','programId','model','provinces','validator'));
    }

    public function view($programId, $id)
    {
        $model = $this->model->find($id);
        $path = $this->view;
        return view('details.'.$this->view.'.view', compact('path','programId','model'));
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

