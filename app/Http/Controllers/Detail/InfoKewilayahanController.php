<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\InfoKewilayahan\InfoKewilayahanRepository;

class InfoKewilayahanController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        InfoKewilayahanRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'info-kewilayahan';
    }

    protected function validationRules($scope = 'create') {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['klasifikasi_berdasarkan_sasaran_utama'] = 'required';
$rule['luas_wilayah_km'] = 'required';
$rule['a41_1_pengembangan_peningkatan_fungsi'] = 'required';
$rule['a41_2_pengembangan_baru'] = 'required';
$rule['a41_3_revitalisasi_kota_yg_telah_berfungsi'] = 'required';
$rule['a42_mendorong_pengembangan_kota_sentra_produksi'] = 'required';
$rule['a43_1_pengembangan_peningkatan_fungsi'] = 'required';
$rule['a43_2_pengembangan_baru'] = 'required';
$rule['a43_3_revitalisasi_kota_yg_telah_berfungsi'] = 'required';
$rule['a44_1_rehabilitasi_kota_akibat_bencana_alam'] = 'required';
$rule['a44_2_pengendalian_mitigasi_bencana'] = 'required';
$rule['a51_lima_kws_metropolitan_br'] = 'required';
$rule['a52_tujuh_kws_perkotaan_metropolitan'] = 'required';
$rule['a53_duapuluh_kota_otonom'] = 'required';
$rule['a54_sepuluh_kota_baru_publik'] = 'required';
$rule['a61_nama_kspn'] = 'required';
$rule['a62_nama_kspn'] = 'required';
$rule['a63_nama_kspn'] = 'required';
$rule['a64_nama_kspn'] = 'required';
$rule['a65_nama_kspn'] = 'required';
$rule['a66_nama_kspn'] = 'required';
$rule['a67_nama_kspn'] = 'required';
$rule['a68_nama_kspn'] = 'required';
$rule['a69_nama_kspn'] = 'required';
$rule['a70_nama_kspn'] = 'required';
$rule['a71_nama_kspn'] = 'required';
$rule['a72_nama_kspn'] = 'required';
$rule['a71_indeks_resiko_bencana'] = 'required';
$rule['a72_1_resiko_tinggi'] = 'required';
$rule['a72_2_resiko_sedang'] = 'required';
$rule['a72_3_resiko_rendah'] = 'required';
$rule['a73_1_banjir'] = 'required';
$rule['a73_2_gempa_bumi'] = 'required';
$rule['a73_3_kebakaran'] = 'required';
$rule['a73_4_tanah_longsor'] = 'required';
$rule['a73_5_tsunami'] = 'required';
$rule['a73_6_banjir_bandang'] = 'required';
$rule['a73_7_kekeringan'] = 'required';
$rule['jml_penduduk_kota_2014'] = 'required';
$rule['jml_penduduk_kota_2015'] = 'required';
$rule['jml_penduduk_kota_2016'] = 'required';
$rule['jml_penduduk_kota_2017'] = 'required';
$rule['jml_penduduk_kota_2018'] = 'required';
$rule['jml_penduduk_desa_2014'] = 'required';
$rule['jml_penduduk_desa_2015'] = 'required';
$rule['jml_penduduk_desa_2016'] = 'required';
$rule['jml_penduduk_desa_2017'] = 'required';
$rule['jml_penduduk_desa_2018'] = 'required';

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

