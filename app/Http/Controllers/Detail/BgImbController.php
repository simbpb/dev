<?php

namespace App\Http\Controllers\Detail;

use JsValidator;
use Validator;
use Navigation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lokasi\LokasiRepository;
use App\Models\Detail\BgImb\BgImbRepository;

class BgImbController extends Controller {

    protected $model;
    protected $lokasi;
    protected $view;

    public function __construct(
        BgImbRepository $model,
        LokasiRepository $lokasi
    ) {
        $this->model = $model;
        $this->lokasi = $lokasi;
        $this->view = 'bg-imb';
    }

    protected function validationRules() {
        $rule['thn_periode_keg'] = 'required';
        $rule['propinsi_id'] = 'required';
        $rule['kota_id'] = 'required';
        $rule['no_perbub_perwal'] = 'required';
$rule['tgl_penetapan_perbub_perwal'] = 'required';
$rule['file_upload_perbub_perwal'] = 'required';
$rule['no_surat_krk'] = 'required';
$rule['nama_permohonan_imb'] = 'required';
$rule['nama_pemilik_perorangan_bg_imb'] = 'required';
$rule['pemilik_perorangan_bg_imb_id'] = 'required';
$rule['nama_pemilik_badan_usaha_bg_imb'] = 'required';
$rule['no_akta_pendirian_badan_usaha_bg_imb'] = 'required';
$rule['nama_institusi_imb'] = 'required';
$rule['no_ikmn_pemerintah_imb'] = 'required';
$rule['no_hdno_pemerintah_imb'] = 'required';
$rule['propinsi_pemilik_bg_imb'] = 'required';
$rule['kabkota_pemilik_bg_imb'] = 'required';
$rule['kec_pemilik_bg_imb'] = 'required';
$rule['kel_pemilik_bg_imb'] = 'required';
$rule['rt_pemilik_bg_imb'] = 'required';
$rule['rw_pemilik_bg_imb'] = 'required';
$rule['alamat_pemilik_bg_imb'] = 'required';
$rule['telp_pemilik_bg_imb'] = 'required';
$rule['email_pemilik_bg_imb'] = 'required';
$rule['nama_pemilik_tanah'] = 'required';
$rule['no_bukti_kepemilikan'] = 'required';
$rule['jenis_bukti_kepemilikan'] = 'required';
$rule['luas_tanah'] = 'required';
$rule['satuan_luas_tanah'] = 'required';
$rule['fungsi_bg'] = 'required';
$rule['jml_lantai_bg'] = 'required';
$rule['luas_bg'] = 'required';
$rule['satuan_luas_bg'] = 'required';
$rule['luas_lantai_basement'] = 'required';
$rule['satuan_lantai_basement'] = 'required';
$rule['tgl_mulai_konstruksi'] = 'required';
$rule['tgl_selesai_konstruksi'] = 'required';
$rule['nilai_bg_sesuai_rab'] = 'required';
$rule['lat_bg'] = 'required';
$rule['long_bg'] = 'required';
$rule['tek_bg_rg_terbuka_hijau_pekarangan'] = 'required';
$rule['tek_bg_limbah_b3'] = 'required';
$rule['tek_bg_memiliki_perangkat_penangkal_kebakaran'] = 'required';
$rule['tek_jenis_sanitasi'] = 'required';
$rule['tek_bg_sumber_air'] = 'required';
$rule['penyedia_js_perencanaan_arsitektur'] = 'required';
$rule['no_serti_js_perencanaan_arsitektur'] = 'required';
$rule['penyedia_js_pelaksana_arsitektur'] = 'required';
$rule['no_serti_js_pelaksana_arsitektur'] = 'required';
$rule['penyedia_js_pengawas_arsitektur'] = 'required';
$rule['no_serti_js_pengawas_arsitektur'] = 'required';
$rule['penyedia_js_perencanaan_struktur'] = 'required';
$rule['no_serti_js_perencanaan_struktur'] = 'required';
$rule['penyedia_js_pelaksana_struktur'] = 'required';
$rule['no_serti_js_pelaksana_struktur'] = 'required';
$rule['penyedia_js_pengawas_struktur'] = 'required';
$rule['no_serti_js_pengawas_struktur'] = 'required';
$rule['penyedia_js_perencanaan_utilitas'] = 'required';
$rule['no_serti_js_perencanaan_utilitas'] = 'required';
$rule['penyedia_js_pelaksana_utilitas'] = 'required';
$rule['no_serti_js_pelaksana_utilitas'] = 'required';
$rule['penyedia_js_pengawas_utilitas'] = 'required';
$rule['no_serti_js_pengawas_utilitas'] = 'required';

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

