<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\Tabg\TabgRepository;

class TabgController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        TabgRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'tabg';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['No_sk_TABG'] = 'required';
$rule['Tgl_sk_TABG'] = 'required';
$rule['Nama_Pejabat'] = 'required';
$rule['Jabatan'] = 'required';
$rule['Nama_TABG'] = 'required';
$rule['No_KTP_TABG'] = 'required';
$rule['Alamat_lengkap_TABG'] = 'required';
$rule['Pendidikan_terakhir_TABG'] = 'required';
$rule['Jurusan_Pendidikan_terakhir'] = 'required';
$rule['Asal_Universitas'] = 'required';
$rule['Bidang_Keahlian'] = 'required';
$rule['Jabatan_dalam_tim'] = 'required';
$rule['Keterangan'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_SK_TABG'] = 'required';
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

