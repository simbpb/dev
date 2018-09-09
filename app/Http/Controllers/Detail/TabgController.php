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

    protected function validationRules() {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['no_perbub_perwal'] = 'required';
$rule['tgl_penetapan_perbub_perwal'] = 'required';
$rule['file_upload_perbub_perwal'] = 'required';
$rule['nama_lengkap'] = 'required';
$rule['keahlian'] = 'required';
$rule['sk_pengangkatan'] = 'required';
$rule['masa_tugas'] = 'required';
$rule['file_upload_sk_pengangkatan'] = 'required';
$rule['fungsi_bg_terdata_dan_imb'] = 'required';
$rule['tipe_bg_terdata_dan_imb'] = 'required';
$rule['nama_pemilik_bg_terdata_imb'] = 'required';
$rule['lok_bg_terdata_imb'] = 'required';
$rule['fungsi_bg_terdata_dan_slf'] = 'required';
$rule['tipe_bg_terdata_dan_slf'] = 'required';
$rule['nama_pemilik_bg_terdata_slf'] = 'required';
$rule['lok_bg_terdata_slf'] = 'required';
$rule['no_imb_bg_didampingi_tabg'] = 'required';
$rule['no_slf_bg_didampingi_tabg'] = 'required';

        return $rule;
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $model = $this->model->list($request->all());
            return $model;
        }
        $path = $this->view;

        return view('details.'.$this->view.'.index', compact('path'));
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
                return redirect(Navigation::adminUrl('/details/'.$this->view));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $provinces = $this->lokasi->getTextProvincesOptions();
        $validator = JsValidator::make($this->validationRules());
        $path = $this->view;

        return view('details.'.$this->view.'.form', compact('path','provinces','validator'));
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
                return redirect(Navigation::adminUrl('/details/'.$this->view));
            } catch (\Exception $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }
        }

        $provinces = $this->lokasi->getProvincesOptions();
        $validator = JsValidator::make($this->validationRules());
        $model = $this->model->find($id);
        $path = $this->view;

        return view('details.'.$this->view.'.form', compact('path','model','provinces','validator'));
    }

    public function view($id)
    {
        $model = $this->model->find($id);
        $path = $this->view;
        return view('details.'.$this->view.'.view', compact('path','model'));
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

