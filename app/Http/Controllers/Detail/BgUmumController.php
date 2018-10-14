<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\BgUmum\BgUmumRepository;

class BgUmumController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        BgUmumRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'bg-umum';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['nama_pemilik_bangunan'] = 'required';
$rule['no_ktp_pemilik_bangunan'] = 'required';
$rule['alamat_bangunan'] = 'required';
$rule['fungsi_bangunan'] = 'required';
$rule['memiliki_imb'] = 'required';
$rule['no_imb'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_imb'] = 'required';
                        }
$rule['memiliki_slf'] = 'required';
$rule['no_slf'] = 'required';

                        if ($scope == 'create') {
                            $rule['file_slf'] = 'required';
                        }
$rule['tingkat_kompleksitas'] = 'required';
$rule['tingkat_permanensi'] = 'required';
$rule['tingkat_risiko_kebakaran'] = 'required';
$rule['zona_gempa'] = 'required';
$rule['kategori_lokasi'] = 'required';
$rule['kategori_ketinggian'] = 'required';
$rule['kepemilikan'] = 'required';

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

