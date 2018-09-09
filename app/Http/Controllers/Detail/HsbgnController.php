<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\Hsbgn\HsbgnRepository;

class HsbgnController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        HsbgnRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'hsbgn';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['thn_penetapan'] = 'required';
        $rule['nama_kecamatan'] = 'required';
        $rule['zona'] = 'required';
        $rule['bg_tidak_sederhana'] = 'required';
        $rule['bg_sederhana'] = 'required';
        $rule['rn_tipe_a'] = 'required';
        $rule['rn_tipe_b'] = 'required';
        $rule['rn_tipe_c_d_e'] = 'required';
        $rule['pagar_gedungnegara_dpn'] = 'required';
        $rule['pagar_gedungnegara_samping'] = 'required';
        $rule['pagar_gedungnegara_blkg'] = 'required';
        $rule['pagar_rn_dpn'] = 'required';
        $rule['pagar_rn_samping'] = 'required';
        $rule['pagar_rn_blkg'] = 'required';
        $rule['harga_satuan'] = 'required';
        $rule['sk_penetapan'] = 'required';
        if ($scope == 'create') {
            $rule['file_sk_penetapan'] = 'required';
        }
        $rule['indeks_kemahalan_konstruksi'] = 'required';

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

            $validation = Validator::make($request->all(), $this->validationRules('edit'));
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
        $validator = JsValidator::make($this->validationRules('edit'));
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

