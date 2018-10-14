<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\PelepasanRng3\PelepasanRng3Repository;

class PelepasanRng3Controller extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        PelepasanRng3Repository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'pelepasan-rng-3';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['hdno_rn'] = 'required';
$rule['nama_kecamatan'] = 'required';
$rule['kemen_lembaga'] = 'required';
$rule['nama_penghuni'] = 'required';
$rule['alamat_rn'] = 'required';
$rule['no_sk_gol3'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_upload_sk_gol3'] = 'required';
                        }
$rule['no_sip_gol3'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_upload_sip_gol3'] = 'required';
                        }
$rule['no_sk_menteri_pupr'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_upload_sk_menteri_pupr'] = 'required';
                        }
$rule['thn_perjanjian_sewabeli'] = 'required';
$rule['status_rn'] = 'required';
$rule['thn_pelepasan_rng3'] = 'required';
$rule['sk_hak_milik'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_upload_sk_hak_milik'] = 'required';
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

