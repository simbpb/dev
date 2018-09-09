<?php
namespace App\Models\Detail\BgSlfke1;

use DB;
use File;
use App\Helpers\Location;

class BgSlfke1Repository
{

    protected $model;
    protected $basePath1 = '/files/details/bg-slfke-1/file-upload-perbub-perwal';

      
    public function __construct(BgSlfke1 $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bg_slfke1.id',
                        'tbl_detail_bg_slfke1.detail_kdprog_id',
                        'tbl_detail_bg_slfke1.thn_periode_keg',
                        'tbl_detail_bg_slfke1.lokasi_kode',
                        'tbl_detail_bg_slfke1.nama_propinsi',
                        'tbl_detail_bg_slfke1.nama_kabupatenkota',
                        'tbl_detail_bg_slfke1.no_perbub_perwal',
'tbl_detail_bg_slfke1.tgl_penetapan_perbub_perwal',
'tbl_detail_bg_slfke1.file_upload_perbub_perwal',
'tbl_detail_bg_slfke1.no_imb',
'tbl_detail_bg_slfke1.no_surat_krk',
'tbl_detail_bg_slfke1.nama_permohonan_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.id_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.jenis_id_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_badan_usaha_bg_slf_ke1',
'tbl_detail_bg_slfke1.no_akta_pendirian_badan_usaha_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_institusi_slf_ke1',
'tbl_detail_bg_slfke1.no_ikmn_pemerintah_slf_ke1',
'tbl_detail_bg_slfke1.no_hdno_pemerintah_slf_ke1',
'tbl_detail_bg_slfke1.propinsi_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kabkota_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kec_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kel_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.rt_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.rw_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.alamat_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.telp_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.email_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_tanah',
'tbl_detail_bg_slfke1.no_bukti_kepemilikan',
'tbl_detail_bg_slfke1.jenis_bukti_kepemilikan',
'tbl_detail_bg_slfke1.luas_tanah',
'tbl_detail_bg_slfke1.satuan_luas_tanah',
'tbl_detail_bg_slfke1.fungsi_bg',
'tbl_detail_bg_slfke1.jml_lantai_bg',
'tbl_detail_bg_slfke1.luas_bg',
'tbl_detail_bg_slfke1.satuan_luas_bg',
'tbl_detail_bg_slfke1.luas_lantai_basement',
'tbl_detail_bg_slfke1.satuan_lantai_basement',
'tbl_detail_bg_slfke1.tgl_mulai_konstruksi',
'tbl_detail_bg_slfke1.tgl_selesai_konstruksi',
'tbl_detail_bg_slfke1.nilai_bg_sesuai_rab',
'tbl_detail_bg_slfke1.lat_bg',
'tbl_detail_bg_slfke1.long_bg',
'tbl_detail_bg_slfke1.tek_bg_rg_terbuka_hijau_pekarangan',
'tbl_detail_bg_slfke1.tek_bg_limbah_b3',
'tbl_detail_bg_slfke1.tek_bg_memiliki_perangkat_penangkal_kebakaran',
'tbl_detail_bg_slfke1.tek_jenis_sanitasi',
'tbl_detail_bg_slfke1.tek_bg_sumber_air',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_struktur',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_struktur',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_struktur',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_struktur',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_struktur',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_struktur',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_utilitas',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_utilitas',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_utilitas',
'tbl_detail_bg_slfke1.perpanjangan_slf_ke'
                    )->searchOrder($request, [
                        'tbl_detail_bg_slfke1.detail_kdprog_id',
                        'tbl_detail_bg_slfke1.thn_periode_keg',
                        'tbl_detail_bg_slfke1.lokasi_kode',
                        'tbl_detail_bg_slfke1.nama_propinsi',
                        'tbl_detail_bg_slfke1.nama_kabupatenkota',
                        'tbl_detail_bg_slfke1.no_perbub_perwal',
'tbl_detail_bg_slfke1.tgl_penetapan_perbub_perwal',
'tbl_detail_bg_slfke1.file_upload_perbub_perwal',
'tbl_detail_bg_slfke1.no_imb',
'tbl_detail_bg_slfke1.no_surat_krk',
'tbl_detail_bg_slfke1.nama_permohonan_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.id_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.jenis_id_pemilik_perorangan_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_badan_usaha_bg_slf_ke1',
'tbl_detail_bg_slfke1.no_akta_pendirian_badan_usaha_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_institusi_slf_ke1',
'tbl_detail_bg_slfke1.no_ikmn_pemerintah_slf_ke1',
'tbl_detail_bg_slfke1.no_hdno_pemerintah_slf_ke1',
'tbl_detail_bg_slfke1.propinsi_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kabkota_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kec_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.kel_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.rt_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.rw_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.alamat_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.telp_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.email_pemilik_bg_slf_ke1',
'tbl_detail_bg_slfke1.nama_pemilik_tanah',
'tbl_detail_bg_slfke1.no_bukti_kepemilikan',
'tbl_detail_bg_slfke1.jenis_bukti_kepemilikan',
'tbl_detail_bg_slfke1.luas_tanah',
'tbl_detail_bg_slfke1.satuan_luas_tanah',
'tbl_detail_bg_slfke1.fungsi_bg',
'tbl_detail_bg_slfke1.jml_lantai_bg',
'tbl_detail_bg_slfke1.luas_bg',
'tbl_detail_bg_slfke1.satuan_luas_bg',
'tbl_detail_bg_slfke1.luas_lantai_basement',
'tbl_detail_bg_slfke1.satuan_lantai_basement',
'tbl_detail_bg_slfke1.tgl_mulai_konstruksi',
'tbl_detail_bg_slfke1.tgl_selesai_konstruksi',
'tbl_detail_bg_slfke1.nilai_bg_sesuai_rab',
'tbl_detail_bg_slfke1.lat_bg',
'tbl_detail_bg_slfke1.long_bg',
'tbl_detail_bg_slfke1.tek_bg_rg_terbuka_hijau_pekarangan',
'tbl_detail_bg_slfke1.tek_bg_limbah_b3',
'tbl_detail_bg_slfke1.tek_bg_memiliki_perangkat_penangkal_kebakaran',
'tbl_detail_bg_slfke1.tek_jenis_sanitasi',
'tbl_detail_bg_slfke1.tek_bg_sumber_air',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_arsitektur',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_arsitektur',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_struktur',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_struktur',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_struktur',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_struktur',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_struktur',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_struktur',
'tbl_detail_bg_slfke1.penyedia_js_perencanaan_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_perencanaan_utilitas',
'tbl_detail_bg_slfke1.penyedia_js_pelaksana_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_pelaksana_utilitas',
'tbl_detail_bg_slfke1.penyedia_js_pengawas_utilitas',
'tbl_detail_bg_slfke1.no_serti_js_pengawas_utilitas',
'tbl_detail_bg_slfke1.perpanjangan_slf_ke'
                    ])
                    ->paginate($limit);

        return (new BgSlfke1Transformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BgSlfke1Transformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
                    if ($request->hasFile('file_upload_perbub_perwal')) {
                        $image = $request->file('file_upload_perbub_perwal');
                        $filename = str_slug($request->file_upload_perbub_perwal).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_perbub_perwal = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
$model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal');
$model->no_imb = $request->input('no_imb');
$model->no_surat_krk = $request->input('no_surat_krk');
$model->nama_permohonan_slf_ke1 = $request->input('nama_permohonan_slf_ke1');
$model->nama_pemilik_perorangan_bg_slf_ke1 = $request->input('nama_pemilik_perorangan_bg_slf_ke1');
$model->id_pemilik_perorangan_bg_slf_ke1 = $request->input('id_pemilik_perorangan_bg_slf_ke1');
$model->jenis_id_pemilik_perorangan_bg_slf_ke1 = $request->input('jenis_id_pemilik_perorangan_bg_slf_ke1');
$model->nama_pemilik_badan_usaha_bg_slf_ke1 = $request->input('nama_pemilik_badan_usaha_bg_slf_ke1');
$model->no_akta_pendirian_badan_usaha_bg_slf_ke1 = $request->input('no_akta_pendirian_badan_usaha_bg_slf_ke1');
$model->nama_institusi_slf_ke1 = $request->input('nama_institusi_slf_ke1');
$model->no_ikmn_pemerintah_slf_ke1 = $request->input('no_ikmn_pemerintah_slf_ke1');
$model->no_hdno_pemerintah_slf_ke1 = $request->input('no_hdno_pemerintah_slf_ke1');
$model->propinsi_pemilik_bg_slf_ke1 = $request->input('propinsi_pemilik_bg_slf_ke1');
$model->kabkota_pemilik_bg_slf_ke1 = $request->input('kabkota_pemilik_bg_slf_ke1');
$model->kec_pemilik_bg_slf_ke1 = $request->input('kec_pemilik_bg_slf_ke1');
$model->kel_pemilik_bg_slf_ke1 = $request->input('kel_pemilik_bg_slf_ke1');
$model->rt_pemilik_bg_slf_ke1 = $request->input('rt_pemilik_bg_slf_ke1');
$model->rw_pemilik_bg_slf_ke1 = $request->input('rw_pemilik_bg_slf_ke1');
$model->alamat_pemilik_bg_slf_ke1 = $request->input('alamat_pemilik_bg_slf_ke1');
$model->telp_pemilik_bg_slf_ke1 = $request->input('telp_pemilik_bg_slf_ke1');
$model->email_pemilik_bg_slf_ke1 = $request->input('email_pemilik_bg_slf_ke1');
$model->nama_pemilik_tanah = $request->input('nama_pemilik_tanah');
$model->no_bukti_kepemilikan = $request->input('no_bukti_kepemilikan');
$model->jenis_bukti_kepemilikan = $request->input('jenis_bukti_kepemilikan');
$model->luas_tanah = $request->input('luas_tanah');
$model->satuan_luas_tanah = $request->input('satuan_luas_tanah');
$model->fungsi_bg = $request->input('fungsi_bg');
$model->jml_lantai_bg = $request->input('jml_lantai_bg');
$model->luas_bg = $request->input('luas_bg');
$model->satuan_luas_bg = $request->input('satuan_luas_bg');
$model->luas_lantai_basement = $request->input('luas_lantai_basement');
$model->satuan_lantai_basement = $request->input('satuan_lantai_basement');
$model->tgl_mulai_konstruksi = $request->input('tgl_mulai_konstruksi');
$model->tgl_selesai_konstruksi = $request->input('tgl_selesai_konstruksi');
$model->nilai_bg_sesuai_rab = $request->input('nilai_bg_sesuai_rab');
$model->lat_bg = $request->input('lat_bg');
$model->long_bg = $request->input('long_bg');
$model->tek_bg_rg_terbuka_hijau_pekarangan = $request->input('tek_bg_rg_terbuka_hijau_pekarangan');
$model->tek_bg_limbah_b3 = $request->input('tek_bg_limbah_b3');
$model->tek_bg_memiliki_perangkat_penangkal_kebakaran = $request->input('tek_bg_memiliki_perangkat_penangkal_kebakaran');
$model->tek_jenis_sanitasi = $request->input('tek_jenis_sanitasi');
$model->tek_bg_sumber_air = $request->input('tek_bg_sumber_air');
$model->penyedia_js_perencanaan_arsitektur = $request->input('penyedia_js_perencanaan_arsitektur');
$model->no_serti_js_perencanaan_arsitektur = $request->input('no_serti_js_perencanaan_arsitektur');
$model->penyedia_js_pelaksana_arsitektur = $request->input('penyedia_js_pelaksana_arsitektur');
$model->no_serti_js_pelaksana_arsitektur = $request->input('no_serti_js_pelaksana_arsitektur');
$model->penyedia_js_pengawas_arsitektur = $request->input('penyedia_js_pengawas_arsitektur');
$model->no_serti_js_pengawas_arsitektur = $request->input('no_serti_js_pengawas_arsitektur');
$model->penyedia_js_perencanaan_struktur = $request->input('penyedia_js_perencanaan_struktur');
$model->no_serti_js_perencanaan_struktur = $request->input('no_serti_js_perencanaan_struktur');
$model->penyedia_js_pelaksana_struktur = $request->input('penyedia_js_pelaksana_struktur');
$model->no_serti_js_pelaksana_struktur = $request->input('no_serti_js_pelaksana_struktur');
$model->penyedia_js_pengawas_struktur = $request->input('penyedia_js_pengawas_struktur');
$model->no_serti_js_pengawas_struktur = $request->input('no_serti_js_pengawas_struktur');
$model->penyedia_js_perencanaan_utilitas = $request->input('penyedia_js_perencanaan_utilitas');
$model->no_serti_js_perencanaan_utilitas = $request->input('no_serti_js_perencanaan_utilitas');
$model->penyedia_js_pelaksana_utilitas = $request->input('penyedia_js_pelaksana_utilitas');
$model->no_serti_js_pelaksana_utilitas = $request->input('no_serti_js_pelaksana_utilitas');
$model->penyedia_js_pengawas_utilitas = $request->input('penyedia_js_pengawas_utilitas');
$model->no_serti_js_pengawas_utilitas = $request->input('no_serti_js_pengawas_utilitas');
$model->perpanjangan_slf_ke = $request->input('perpanjangan_slf_ke');
        $model->detail_kdprog_id = '0';
        $model->is_actived = '00';
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        
                    if ($request->hasFile('file_upload_perbub_perwal')) {
                        $image = $request->file('file_upload_perbub_perwal');
                        if (File::exists(public_path($model->file_upload_perbub_perwal))) {
                            File::delete(public_path($model->file_upload_perbub_perwal));
                        }
                        $filename = str_slug($request->file_upload_perbub_perwal).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_perbub_perwal = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
$model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal');
$model->no_imb = $request->input('no_imb');
$model->no_surat_krk = $request->input('no_surat_krk');
$model->nama_permohonan_slf_ke1 = $request->input('nama_permohonan_slf_ke1');
$model->nama_pemilik_perorangan_bg_slf_ke1 = $request->input('nama_pemilik_perorangan_bg_slf_ke1');
$model->id_pemilik_perorangan_bg_slf_ke1 = $request->input('id_pemilik_perorangan_bg_slf_ke1');
$model->jenis_id_pemilik_perorangan_bg_slf_ke1 = $request->input('jenis_id_pemilik_perorangan_bg_slf_ke1');
$model->nama_pemilik_badan_usaha_bg_slf_ke1 = $request->input('nama_pemilik_badan_usaha_bg_slf_ke1');
$model->no_akta_pendirian_badan_usaha_bg_slf_ke1 = $request->input('no_akta_pendirian_badan_usaha_bg_slf_ke1');
$model->nama_institusi_slf_ke1 = $request->input('nama_institusi_slf_ke1');
$model->no_ikmn_pemerintah_slf_ke1 = $request->input('no_ikmn_pemerintah_slf_ke1');
$model->no_hdno_pemerintah_slf_ke1 = $request->input('no_hdno_pemerintah_slf_ke1');
$model->propinsi_pemilik_bg_slf_ke1 = $request->input('propinsi_pemilik_bg_slf_ke1');
$model->kabkota_pemilik_bg_slf_ke1 = $request->input('kabkota_pemilik_bg_slf_ke1');
$model->kec_pemilik_bg_slf_ke1 = $request->input('kec_pemilik_bg_slf_ke1');
$model->kel_pemilik_bg_slf_ke1 = $request->input('kel_pemilik_bg_slf_ke1');
$model->rt_pemilik_bg_slf_ke1 = $request->input('rt_pemilik_bg_slf_ke1');
$model->rw_pemilik_bg_slf_ke1 = $request->input('rw_pemilik_bg_slf_ke1');
$model->alamat_pemilik_bg_slf_ke1 = $request->input('alamat_pemilik_bg_slf_ke1');
$model->telp_pemilik_bg_slf_ke1 = $request->input('telp_pemilik_bg_slf_ke1');
$model->email_pemilik_bg_slf_ke1 = $request->input('email_pemilik_bg_slf_ke1');
$model->nama_pemilik_tanah = $request->input('nama_pemilik_tanah');
$model->no_bukti_kepemilikan = $request->input('no_bukti_kepemilikan');
$model->jenis_bukti_kepemilikan = $request->input('jenis_bukti_kepemilikan');
$model->luas_tanah = $request->input('luas_tanah');
$model->satuan_luas_tanah = $request->input('satuan_luas_tanah');
$model->fungsi_bg = $request->input('fungsi_bg');
$model->jml_lantai_bg = $request->input('jml_lantai_bg');
$model->luas_bg = $request->input('luas_bg');
$model->satuan_luas_bg = $request->input('satuan_luas_bg');
$model->luas_lantai_basement = $request->input('luas_lantai_basement');
$model->satuan_lantai_basement = $request->input('satuan_lantai_basement');
$model->tgl_mulai_konstruksi = $request->input('tgl_mulai_konstruksi');
$model->tgl_selesai_konstruksi = $request->input('tgl_selesai_konstruksi');
$model->nilai_bg_sesuai_rab = $request->input('nilai_bg_sesuai_rab');
$model->lat_bg = $request->input('lat_bg');
$model->long_bg = $request->input('long_bg');
$model->tek_bg_rg_terbuka_hijau_pekarangan = $request->input('tek_bg_rg_terbuka_hijau_pekarangan');
$model->tek_bg_limbah_b3 = $request->input('tek_bg_limbah_b3');
$model->tek_bg_memiliki_perangkat_penangkal_kebakaran = $request->input('tek_bg_memiliki_perangkat_penangkal_kebakaran');
$model->tek_jenis_sanitasi = $request->input('tek_jenis_sanitasi');
$model->tek_bg_sumber_air = $request->input('tek_bg_sumber_air');
$model->penyedia_js_perencanaan_arsitektur = $request->input('penyedia_js_perencanaan_arsitektur');
$model->no_serti_js_perencanaan_arsitektur = $request->input('no_serti_js_perencanaan_arsitektur');
$model->penyedia_js_pelaksana_arsitektur = $request->input('penyedia_js_pelaksana_arsitektur');
$model->no_serti_js_pelaksana_arsitektur = $request->input('no_serti_js_pelaksana_arsitektur');
$model->penyedia_js_pengawas_arsitektur = $request->input('penyedia_js_pengawas_arsitektur');
$model->no_serti_js_pengawas_arsitektur = $request->input('no_serti_js_pengawas_arsitektur');
$model->penyedia_js_perencanaan_struktur = $request->input('penyedia_js_perencanaan_struktur');
$model->no_serti_js_perencanaan_struktur = $request->input('no_serti_js_perencanaan_struktur');
$model->penyedia_js_pelaksana_struktur = $request->input('penyedia_js_pelaksana_struktur');
$model->no_serti_js_pelaksana_struktur = $request->input('no_serti_js_pelaksana_struktur');
$model->penyedia_js_pengawas_struktur = $request->input('penyedia_js_pengawas_struktur');
$model->no_serti_js_pengawas_struktur = $request->input('no_serti_js_pengawas_struktur');
$model->penyedia_js_perencanaan_utilitas = $request->input('penyedia_js_perencanaan_utilitas');
$model->no_serti_js_perencanaan_utilitas = $request->input('no_serti_js_perencanaan_utilitas');
$model->penyedia_js_pelaksana_utilitas = $request->input('penyedia_js_pelaksana_utilitas');
$model->no_serti_js_pelaksana_utilitas = $request->input('no_serti_js_pelaksana_utilitas');
$model->penyedia_js_pengawas_utilitas = $request->input('penyedia_js_pengawas_utilitas');
$model->no_serti_js_pengawas_utilitas = $request->input('no_serti_js_pengawas_utilitas');
$model->perpanjangan_slf_ke = $request->input('perpanjangan_slf_ke');
        $model->detail_kdprog_id = '0';
        $model->is_actived = '00';
        $model->save();
        
        DB::commit();
        return true;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->delete();
        DB::commit();
        return true;
    }
}