<?php
namespace App\Models\Faq\FaqRevolusiMental;

use DB;
use File;

class FaqRevolusiMentalRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-revolusi-mental/dokumentasi';

      
    public function __construct(
        FaqRevolusiMental $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_revolusi_mental.id',
                        'faq_revolusi_mental.revolusi_mental_id',
						'faq_revolusi_mental.info_wilayah_id',
						'faq_revolusi_mental.detail_kdprog_id',
						'faq_revolusi_mental.thn_periode_keg',
						'faq_revolusi_mental.lokasi_kode',
						'faq_revolusi_mental.nama_propinsi',
						'faq_revolusi_mental.nama_kabupatenkota',
						'faq_revolusi_mental.kd_struktur',
						'faq_revolusi_mental.nama_kegiatan',
						'faq_revolusi_mental.thn_anggaran',
						'faq_revolusi_mental.sumber_anggaran',
						'faq_revolusi_mental.alokasi_anggaran',
						'faq_revolusi_mental.volume_pekerjaan',
						'faq_revolusi_mental.instansi_unit_organisasi_pelaksana',
						'faq_revolusi_mental.lokasi_kegiatan_proyek',
						'faq_revolusi_mental.titik_koordinat_lat',
						'faq_revolusi_mental.titik_koordinat_long',
						'faq_revolusi_mental.status_aset',
						'faq_revolusi_mental.biaya_pelaksanaan_kontraktor',
						'faq_revolusi_mental.manajemen_konstruksi',
						'faq_revolusi_mental.rencana_keu',
						'faq_revolusi_mental.rencana_fisik',
						'faq_revolusi_mental.dokumentasi',
						'faq_revolusi_mental.tgl_input_wilayah',
						'faq_revolusi_mental.info_wilayah_sk',
						'faq_revolusi_mental.last_update',
                        'faq_revolusi_mental.is_actived'
                    )->searchOrder($request, [
                        'faq_revolusi_mental.revolusi_mental_id',
						'faq_revolusi_mental.info_wilayah_id',
						'faq_revolusi_mental.detail_kdprog_id',
						'faq_revolusi_mental.thn_periode_keg',
						'faq_revolusi_mental.lokasi_kode',
						'faq_revolusi_mental.nama_propinsi',
						'faq_revolusi_mental.nama_kabupatenkota',
						'faq_revolusi_mental.kd_struktur',
						'faq_revolusi_mental.nama_kegiatan',
						'faq_revolusi_mental.thn_anggaran',
						'faq_revolusi_mental.sumber_anggaran',
						'faq_revolusi_mental.alokasi_anggaran',
						'faq_revolusi_mental.volume_pekerjaan',
						'faq_revolusi_mental.instansi_unit_organisasi_pelaksana',
						'faq_revolusi_mental.lokasi_kegiatan_proyek',
						'faq_revolusi_mental.titik_koordinat_lat',
						'faq_revolusi_mental.titik_koordinat_long',
						'faq_revolusi_mental.status_aset',
						'faq_revolusi_mental.biaya_pelaksanaan_kontraktor',
						'faq_revolusi_mental.manajemen_konstruksi',
						'faq_revolusi_mental.rencana_keu',
						'faq_revolusi_mental.rencana_fisik',
						'faq_revolusi_mental.dokumentasi',
						'faq_revolusi_mental.tgl_input_wilayah',
						'faq_revolusi_mental.info_wilayah_sk',
						'faq_revolusi_mental.last_update',
                        'faq_revolusi_mental.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRevolusiMentalTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			if (File::exists(public_path($model->dokumentasi))) {
				File::delete(public_path($model->dokumentasi));
			}
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}

        $model->revolusi_mental_id = $request->input('revolusi_mental_id');
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
		$model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
		$model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
		$model->rencana_keu = $request->input('rencana_keu');
		$model->rencana_fisik = $request->input('rencana_fisik');
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
                        'faq_revolusi_mental.id',
                        'faq_revolusi_mental.revolusi_mental_id',
						'faq_revolusi_mental.info_wilayah_id',
						'faq_revolusi_mental.detail_kdprog_id',
						'faq_revolusi_mental.thn_periode_keg',
						'faq_revolusi_mental.lokasi_kode',
						'faq_revolusi_mental.nama_propinsi',
						'faq_revolusi_mental.nama_kabupatenkota',
						'faq_revolusi_mental.kd_struktur',
						'faq_revolusi_mental.nama_kegiatan',
						'faq_revolusi_mental.thn_anggaran',
						'faq_revolusi_mental.sumber_anggaran',
						'faq_revolusi_mental.alokasi_anggaran',
						'faq_revolusi_mental.volume_pekerjaan',
						'faq_revolusi_mental.instansi_unit_organisasi_pelaksana',
						'faq_revolusi_mental.lokasi_kegiatan_proyek',
						'faq_revolusi_mental.titik_koordinat_lat',
						'faq_revolusi_mental.titik_koordinat_long',
						'faq_revolusi_mental.status_aset',
						'faq_revolusi_mental.biaya_pelaksanaan_kontraktor',
						'faq_revolusi_mental.manajemen_konstruksi',
						'faq_revolusi_mental.rencana_keu',
						'faq_revolusi_mental.rencana_fisik',
						'faq_revolusi_mental.dokumentasi',
						'faq_revolusi_mental.tgl_input_wilayah',
						'faq_revolusi_mental.info_wilayah_sk',
						'faq_revolusi_mental.last_update',
                        'faq_revolusi_mental.is_actived'
                    )->searchOrder($request, [
                        'faq_revolusi_mental.revolusi_mental_id',
						'faq_revolusi_mental.info_wilayah_id',
						'faq_revolusi_mental.detail_kdprog_id',
						'faq_revolusi_mental.thn_periode_keg',
						'faq_revolusi_mental.lokasi_kode',
						'faq_revolusi_mental.nama_propinsi',
						'faq_revolusi_mental.nama_kabupatenkota',
						'faq_revolusi_mental.kd_struktur',
						'faq_revolusi_mental.nama_kegiatan',
						'faq_revolusi_mental.thn_anggaran',
						'faq_revolusi_mental.sumber_anggaran',
						'faq_revolusi_mental.alokasi_anggaran',
						'faq_revolusi_mental.volume_pekerjaan',
						'faq_revolusi_mental.instansi_unit_organisasi_pelaksana',
						'faq_revolusi_mental.lokasi_kegiatan_proyek',
						'faq_revolusi_mental.titik_koordinat_lat',
						'faq_revolusi_mental.titik_koordinat_long',
						'faq_revolusi_mental.status_aset',
						'faq_revolusi_mental.biaya_pelaksanaan_kontraktor',
						'faq_revolusi_mental.manajemen_konstruksi',
						'faq_revolusi_mental.rencana_keu',
						'faq_revolusi_mental.rencana_fisik',
						'faq_revolusi_mental.dokumentasi',
						'faq_revolusi_mental.tgl_input_wilayah',
						'faq_revolusi_mental.info_wilayah_sk',
						'faq_revolusi_mental.last_update',
                        'faq_revolusi_mental.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRevolusiMentalTransformer)->transformPaginate($model);
    }
}