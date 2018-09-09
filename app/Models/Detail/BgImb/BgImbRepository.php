<?php
namespace App\Models\Detail\BgImb;

use DB;
use File;
use App\Helpers\Location;

class BgImbRepository
{

    protected $model;
    protected $basePath1 = '/files/details/bg-imb/file-upload-perbub-perwal';

      
    public function __construct(BgImb $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bg_imb.id',
                        'tbl_detail_bg_imb.detail_kdprog_id',
                        'tbl_detail_bg_imb.thn_periode_keg',
                        'tbl_detail_bg_imb.lokasi_kode',
                        'tbl_detail_bg_imb.nama_propinsi',
                        'tbl_detail_bg_imb.nama_kabupatenkota',
                        'tbl_detail_bg_imb.no_perbub_perwal',
'tbl_detail_bg_imb.tgl_penetapan_perbub_perwal',
'tbl_detail_bg_imb.file_upload_perbub_perwal',
'tbl_detail_bg_imb.no_surat_krk',
'tbl_detail_bg_imb.nama_permohonan_imb',
'tbl_detail_bg_imb.nama_pemilik_perorangan_bg_imb',
'tbl_detail_bg_imb.pemilik_perorangan_bg_imb_id',
'tbl_detail_bg_imb.nama_pemilik_badan_usaha_bg_imb',
'tbl_detail_bg_imb.no_akta_pendirian_badan_usaha_bg_imb',
'tbl_detail_bg_imb.nama_institusi_imb',
'tbl_detail_bg_imb.no_ikmn_pemerintah_imb',
'tbl_detail_bg_imb.no_hdno_pemerintah_imb',
'tbl_detail_bg_imb.propinsi_pemilik_bg_imb',
'tbl_detail_bg_imb.kabkota_pemilik_bg_imb',
'tbl_detail_bg_imb.kec_pemilik_bg_imb',
'tbl_detail_bg_imb.kel_pemilik_bg_imb',
'tbl_detail_bg_imb.rt_pemilik_bg_imb',
'tbl_detail_bg_imb.rw_pemilik_bg_imb',
'tbl_detail_bg_imb.alamat_pemilik_bg_imb',
'tbl_detail_bg_imb.telp_pemilik_bg_imb',
'tbl_detail_bg_imb.email_pemilik_bg_imb',
'tbl_detail_bg_imb.nama_pemilik_tanah',
'tbl_detail_bg_imb.no_bukti_kepemilikan',
'tbl_detail_bg_imb.jenis_bukti_kepemilikan',
'tbl_detail_bg_imb.luas_tanah',
'tbl_detail_bg_imb.satuan_luas_tanah',
'tbl_detail_bg_imb.fungsi_bg',
'tbl_detail_bg_imb.jml_lantai_bg',
'tbl_detail_bg_imb.luas_bg',
'tbl_detail_bg_imb.satuan_luas_bg',
'tbl_detail_bg_imb.luas_lantai_basement',
'tbl_detail_bg_imb.satuan_lantai_basement',
'tbl_detail_bg_imb.tgl_mulai_konstruksi',
'tbl_detail_bg_imb.tgl_selesai_konstruksi',
'tbl_detail_bg_imb.nilai_bg_sesuai_rab',
'tbl_detail_bg_imb.lat_bg',
'tbl_detail_bg_imb.long_bg',
'tbl_detail_bg_imb.tek_bg_rg_terbuka_hijau_pekarangan',
'tbl_detail_bg_imb.tek_bg_limbah_b3',
'tbl_detail_bg_imb.tek_bg_memiliki_perangkat_penangkal_kebakaran',
'tbl_detail_bg_imb.tek_jenis_sanitasi',
'tbl_detail_bg_imb.tek_bg_sumber_air',
'tbl_detail_bg_imb.penyedia_js_perencanaan_arsitektur',
'tbl_detail_bg_imb.no_serti_js_perencanaan_arsitektur',
'tbl_detail_bg_imb.penyedia_js_pelaksana_arsitektur',
'tbl_detail_bg_imb.no_serti_js_pelaksana_arsitektur',
'tbl_detail_bg_imb.penyedia_js_pengawas_arsitektur',
'tbl_detail_bg_imb.no_serti_js_pengawas_arsitektur',
'tbl_detail_bg_imb.penyedia_js_perencanaan_struktur',
'tbl_detail_bg_imb.no_serti_js_perencanaan_struktur',
'tbl_detail_bg_imb.penyedia_js_pelaksana_struktur',
'tbl_detail_bg_imb.no_serti_js_pelaksana_struktur',
'tbl_detail_bg_imb.penyedia_js_pengawas_struktur',
'tbl_detail_bg_imb.no_serti_js_pengawas_struktur',
'tbl_detail_bg_imb.penyedia_js_perencanaan_utilitas',
'tbl_detail_bg_imb.no_serti_js_perencanaan_utilitas',
'tbl_detail_bg_imb.penyedia_js_pelaksana_utilitas',
'tbl_detail_bg_imb.no_serti_js_pelaksana_utilitas',
'tbl_detail_bg_imb.penyedia_js_pengawas_utilitas',
'tbl_detail_bg_imb.no_serti_js_pengawas_utilitas'
                    )->searchOrder($request, [
                        'tbl_detail_bg_imb.detail_kdprog_id',
                        'tbl_detail_bg_imb.thn_periode_keg',
                        'tbl_detail_bg_imb.lokasi_kode',
                        'tbl_detail_bg_imb.nama_propinsi',
                        'tbl_detail_bg_imb.nama_kabupatenkota',
                        'tbl_detail_bg_imb.no_perbub_perwal',
'tbl_detail_bg_imb.tgl_penetapan_perbub_perwal',
'tbl_detail_bg_imb.file_upload_perbub_perwal',
'tbl_detail_bg_imb.no_surat_krk',
'tbl_detail_bg_imb.nama_permohonan_imb',
'tbl_detail_bg_imb.nama_pemilik_perorangan_bg_imb',
'tbl_detail_bg_imb.pemilik_perorangan_bg_imb_id',
'tbl_detail_bg_imb.nama_pemilik_badan_usaha_bg_imb',
'tbl_detail_bg_imb.no_akta_pendirian_badan_usaha_bg_imb',
'tbl_detail_bg_imb.nama_institusi_imb',
'tbl_detail_bg_imb.no_ikmn_pemerintah_imb',
'tbl_detail_bg_imb.no_hdno_pemerintah_imb',
'tbl_detail_bg_imb.propinsi_pemilik_bg_imb',
'tbl_detail_bg_imb.kabkota_pemilik_bg_imb',
'tbl_detail_bg_imb.kec_pemilik_bg_imb',
'tbl_detail_bg_imb.kel_pemilik_bg_imb',
'tbl_detail_bg_imb.rt_pemilik_bg_imb',
'tbl_detail_bg_imb.rw_pemilik_bg_imb',
'tbl_detail_bg_imb.alamat_pemilik_bg_imb',
'tbl_detail_bg_imb.telp_pemilik_bg_imb',
'tbl_detail_bg_imb.email_pemilik_bg_imb',
'tbl_detail_bg_imb.nama_pemilik_tanah',
'tbl_detail_bg_imb.no_bukti_kepemilikan',
'tbl_detail_bg_imb.jenis_bukti_kepemilikan',
'tbl_detail_bg_imb.luas_tanah',
'tbl_detail_bg_imb.satuan_luas_tanah',
'tbl_detail_bg_imb.fungsi_bg',
'tbl_detail_bg_imb.jml_lantai_bg',
'tbl_detail_bg_imb.luas_bg',
'tbl_detail_bg_imb.satuan_luas_bg',
'tbl_detail_bg_imb.luas_lantai_basement',
'tbl_detail_bg_imb.satuan_lantai_basement',
'tbl_detail_bg_imb.tgl_mulai_konstruksi',
'tbl_detail_bg_imb.tgl_selesai_konstruksi',
'tbl_detail_bg_imb.nilai_bg_sesuai_rab',
'tbl_detail_bg_imb.lat_bg',
'tbl_detail_bg_imb.long_bg',
'tbl_detail_bg_imb.tek_bg_rg_terbuka_hijau_pekarangan',
'tbl_detail_bg_imb.tek_bg_limbah_b3',
'tbl_detail_bg_imb.tek_bg_memiliki_perangkat_penangkal_kebakaran',
'tbl_detail_bg_imb.tek_jenis_sanitasi',
'tbl_detail_bg_imb.tek_bg_sumber_air',
'tbl_detail_bg_imb.penyedia_js_perencanaan_arsitektur',
'tbl_detail_bg_imb.no_serti_js_perencanaan_arsitektur',
'tbl_detail_bg_imb.penyedia_js_pelaksana_arsitektur',
'tbl_detail_bg_imb.no_serti_js_pelaksana_arsitektur',
'tbl_detail_bg_imb.penyedia_js_pengawas_arsitektur',
'tbl_detail_bg_imb.no_serti_js_pengawas_arsitektur',
'tbl_detail_bg_imb.penyedia_js_perencanaan_struktur',
'tbl_detail_bg_imb.no_serti_js_perencanaan_struktur',
'tbl_detail_bg_imb.penyedia_js_pelaksana_struktur',
'tbl_detail_bg_imb.no_serti_js_pelaksana_struktur',
'tbl_detail_bg_imb.penyedia_js_pengawas_struktur',
'tbl_detail_bg_imb.no_serti_js_pengawas_struktur',
'tbl_detail_bg_imb.penyedia_js_perencanaan_utilitas',
'tbl_detail_bg_imb.no_serti_js_perencanaan_utilitas',
'tbl_detail_bg_imb.penyedia_js_pelaksana_utilitas',
'tbl_detail_bg_imb.no_serti_js_pelaksana_utilitas',
'tbl_detail_bg_imb.penyedia_js_pengawas_utilitas',
'tbl_detail_bg_imb.no_serti_js_pengawas_utilitas'
                    ])
                    ->paginate($limit);

        return (new BgImbTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BgImbTransformer)->transformDetail($model);
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
$model->no_surat_krk = $request->input('no_surat_krk');
$model->nama_permohonan_imb = $request->input('nama_permohonan_imb');
$model->nama_pemilik_perorangan_bg_imb = $request->input('nama_pemilik_perorangan_bg_imb');
$model->pemilik_perorangan_bg_imb_id = $request->input('pemilik_perorangan_bg_imb_id');
$model->nama_pemilik_badan_usaha_bg_imb = $request->input('nama_pemilik_badan_usaha_bg_imb');
$model->no_akta_pendirian_badan_usaha_bg_imb = $request->input('no_akta_pendirian_badan_usaha_bg_imb');
$model->nama_institusi_imb = $request->input('nama_institusi_imb');
$model->no_ikmn_pemerintah_imb = $request->input('no_ikmn_pemerintah_imb');
$model->no_hdno_pemerintah_imb = $request->input('no_hdno_pemerintah_imb');
$model->propinsi_pemilik_bg_imb = $request->input('propinsi_pemilik_bg_imb');
$model->kabkota_pemilik_bg_imb = $request->input('kabkota_pemilik_bg_imb');
$model->kec_pemilik_bg_imb = $request->input('kec_pemilik_bg_imb');
$model->kel_pemilik_bg_imb = $request->input('kel_pemilik_bg_imb');
$model->rt_pemilik_bg_imb = $request->input('rt_pemilik_bg_imb');
$model->rw_pemilik_bg_imb = $request->input('rw_pemilik_bg_imb');
$model->alamat_pemilik_bg_imb = $request->input('alamat_pemilik_bg_imb');
$model->telp_pemilik_bg_imb = $request->input('telp_pemilik_bg_imb');
$model->email_pemilik_bg_imb = $request->input('email_pemilik_bg_imb');
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
$model->no_surat_krk = $request->input('no_surat_krk');
$model->nama_permohonan_imb = $request->input('nama_permohonan_imb');
$model->nama_pemilik_perorangan_bg_imb = $request->input('nama_pemilik_perorangan_bg_imb');
$model->pemilik_perorangan_bg_imb_id = $request->input('pemilik_perorangan_bg_imb_id');
$model->nama_pemilik_badan_usaha_bg_imb = $request->input('nama_pemilik_badan_usaha_bg_imb');
$model->no_akta_pendirian_badan_usaha_bg_imb = $request->input('no_akta_pendirian_badan_usaha_bg_imb');
$model->nama_institusi_imb = $request->input('nama_institusi_imb');
$model->no_ikmn_pemerintah_imb = $request->input('no_ikmn_pemerintah_imb');
$model->no_hdno_pemerintah_imb = $request->input('no_hdno_pemerintah_imb');
$model->propinsi_pemilik_bg_imb = $request->input('propinsi_pemilik_bg_imb');
$model->kabkota_pemilik_bg_imb = $request->input('kabkota_pemilik_bg_imb');
$model->kec_pemilik_bg_imb = $request->input('kec_pemilik_bg_imb');
$model->kel_pemilik_bg_imb = $request->input('kel_pemilik_bg_imb');
$model->rt_pemilik_bg_imb = $request->input('rt_pemilik_bg_imb');
$model->rw_pemilik_bg_imb = $request->input('rw_pemilik_bg_imb');
$model->alamat_pemilik_bg_imb = $request->input('alamat_pemilik_bg_imb');
$model->telp_pemilik_bg_imb = $request->input('telp_pemilik_bg_imb');
$model->email_pemilik_bg_imb = $request->input('email_pemilik_bg_imb');
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