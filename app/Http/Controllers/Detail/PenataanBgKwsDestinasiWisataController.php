<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\PenataanBgKwsDestinasiWisata\PenataanBgKwsDestinasiWisataRepository;

class PenataanBgKwsDestinasiWisataController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        PenataanBgKwsDestinasiWisataRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'penataan-bg-kws-destinasi-wisata';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['lokasi_berada_di_kawasan'] = 'required';
$rule['nama_kawasan'] = 'required';
$rule['nama_kegiatan'] = 'required';
$rule['thn_anggaran'] = 'required';
$rule['sumber_anggaran'] = 'required';
$rule['alokasi_anggaran'] = 'required';
$rule['volume_pekerjaan'] = 'required';
$rule['instansi_unit_organisasi_pelaksana'] = 'required';
$rule['lokasi_kegiatan_proyek'] = 'required';
$rule['titik_koordinat_lat'] = 'required';
$rule['titik_koordinat_long'] = 'required';
$rule['status_aset'] = 'required';
$rule['biaya_pelaksanaan_kontraktor'] = 'required';
$rule['manajemen_konstruksi'] = 'required';
$rule['rencana_keu'] = 'required';
$rule['rencana_fisik'] = 'required';

                        if ($scope == 'create') {
                            $rule['dokumentasi'] = 'required';
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

