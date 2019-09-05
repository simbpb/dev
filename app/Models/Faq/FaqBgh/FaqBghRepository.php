<?php
namespace App\Models\Faq\FaqBgh;

use DB;
use File;

class FaqBghRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bgh/file-upload-sertifikat-bgh';
protected $basePath2 = '/files/faqs/faq-bgh/file-upload-sertifikat-pemanfaatan-bgh';

      
    public function __construct(
        FaqBgh $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bgh.id',
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    )->searchOrder($request, [
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBghTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('file_upload_sertifikat_bgh')) {
			$image = $request->file('file_upload_sertifikat_bgh');
			if (File::exists(public_path($model->file_upload_sertifikat_bgh))) {
				File::delete(public_path($model->file_upload_sertifikat_bgh));
			}
			$filename = str_slug($request->file_upload_sertifikat_bgh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_upload_sertifikat_bgh = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_upload_sertifikat_pemanfaatan_bgh')) {
			$image = $request->file('file_upload_sertifikat_pemanfaatan_bgh');
			if (File::exists(public_path($model->file_upload_sertifikat_pemanfaatan_bgh))) {
				File::delete(public_path($model->file_upload_sertifikat_pemanfaatan_bgh));
			}
			$filename = str_slug($request->file_upload_sertifikat_pemanfaatan_bgh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_upload_sertifikat_pemanfaatan_bgh = $this->basePath2.'/'.$filename;
		}

        $model->bgh_id = $request->input('bgh_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->nama_kegiatan = $request->input('nama_kegiatan');
		$model->thn_anggaran = $request->input('thn_anggaran');
		$model->sumber_anggaran = $request->input('sumber_anggaran');
		$model->alokasi_anggaran = $request->input('alokasi_anggaran');
		$model->volume_pekerjaan = $request->input('volume_pekerjaan');
		$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
		$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
		$model->status_aset = $request->input('status_aset');
		$model->nama_kepala_dinas = $request->input('nama_kepala_dinas');
		$model->nama_pengelola = $request->input('nama_pengelola');
		$model->nama_penyedia_jasa_perencanaan = $request->input('nama_penyedia_jasa_perencanaan');
		$model->thn_penerbitan_sertifikat_bgh = $request->input('thn_penerbitan_sertifikat_bgh');
		$model->no_sertifikat_bgh = $request->input('no_sertifikat_bgh');
		$model->no_plakat_bgh = $request->input('no_plakat_bgh');
		$model->thn_penerbitan_sertifikat_pemanfaatan_bgh = $request->input('thn_penerbitan_sertifikat_pemanfaatan_bgh');
		$model->peringkat_bgh = $request->input('peringkat_bgh');
		$model->pemanfaatan_ke = $request->input('pemanfaatan_ke');
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
                        'faq_bgh.id',
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    )->searchOrder($request, [
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBghTransformer)->transformPaginate($model);
    }
}