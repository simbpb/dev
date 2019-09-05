<?php
namespace App\Models\Faq\FaqPengelolaTeknisBersertifikasi;

use DB;
use File;

class FaqPengelolaTeknisBersertifikasiRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-pengelola-teknis-bersertifikasi/file-sertifikat-pengelola-teknis';

      
    public function __construct(
        FaqPengelolaTeknisBersertifikasi $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengelola_teknis_bersertifikasi.id',
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPengelolaTeknisBersertifikasiTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return $model;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        
        
		if ($request->hasFile('file_sertifikat_pengelola_teknis')) {
			$image = $request->file('file_sertifikat_pengelola_teknis');
			if (File::exists(public_path($model->file_sertifikat_pengelola_teknis))) {
				File::delete(public_path($model->file_sertifikat_pengelola_teknis));
			}
			$filename = str_slug($request->file_sertifikat_pengelola_teknis).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sertifikat_pengelola_teknis = $this->basePath1.'/'.$filename;
		}

        $model->pengelola_teknis_bersertifikasi_id = $request->input('pengelola_teknis_bersertifikasi_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->no_sertifikat_pengelola_teknis = $request->input('no_sertifikat_pengelola_teknis');
		$model->tgl_sertifikat_pengelola_teknis = $request->input('tgl_sertifikat_pengelola_teknis');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_pengelola_teknis = $request->input('nama_pengelola_teknis');
		$model->no_ktp_pengelola_teknis = $request->input('no_ktp_pengelola_teknis');
		$model->dinas_instansi_asal_unit_org = $request->input('dinas_instansi_asal_unit_org');
		$model->alamat_pengelola_teknis = $request->input('alamat_pengelola_teknis');
		$model->pendidikan_terakhir_pengelola_teknis = $request->input('pendidikan_terakhir_pengelola_teknis');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		$model->tgl_input_wilayah = $request->input('tgl_input_wilayah');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
        
        $model->save();
        
        DB::commit();
        return true;
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengelola_teknis_bersertifikasi.id',
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPengelolaTeknisBersertifikasiTransformer)->transformPaginate($model);
    }
}