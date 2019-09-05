<?php
namespace App\Models\Faq\FaqBgMitigasiBencana;

use DB;
use File;

class FaqBgMitigasiBencanaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bg-mitigasi-bencana/dokumentasi';

      
    public function __construct(
        FaqBgMitigasiBencana $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_mitigasi_bencana.id',
                        'faq_bg_mitigasi_bencana.mitigasi_bencana_id',
						'faq_bg_mitigasi_bencana.info_wilayah_id',
						'faq_bg_mitigasi_bencana.detail_kdprog_id',
						'faq_bg_mitigasi_bencana.thn_periode_keg',
						'faq_bg_mitigasi_bencana.lokasi_kode',
						'faq_bg_mitigasi_bencana.nama_propinsi',
						'faq_bg_mitigasi_bencana.nama_kabupatenkota',
						'faq_bg_mitigasi_bencana.kd_struktur',
						'faq_bg_mitigasi_bencana.nama_kegiatan',
						'faq_bg_mitigasi_bencana.thn_anggaran',
						'faq_bg_mitigasi_bencana.sumber_anggaran',
						'faq_bg_mitigasi_bencana.alokasi_anggaran',
						'faq_bg_mitigasi_bencana.volume_pekerjaan',
						'faq_bg_mitigasi_bencana.instansi_unit_organisasi_pelaksana',
						'faq_bg_mitigasi_bencana.lokasi_kegiatan_proyek',
						'faq_bg_mitigasi_bencana.titik_koordinat_lat',
						'faq_bg_mitigasi_bencana.titik_koordinat_long',
						'faq_bg_mitigasi_bencana.status_aset',
						'faq_bg_mitigasi_bencana.biaya_pelaksanaan_kontraktor',
						'faq_bg_mitigasi_bencana.manajemen_konstruksi',
						'faq_bg_mitigasi_bencana.rencana_keu',
						'faq_bg_mitigasi_bencana.rencana_fisik',
						'faq_bg_mitigasi_bencana.dokumentasi',
						'faq_bg_mitigasi_bencana.tgl_input_wilayah',
						'faq_bg_mitigasi_bencana.info_wilayah_sk',
						'faq_bg_mitigasi_bencana.last_update',
                        'faq_bg_mitigasi_bencana.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_mitigasi_bencana.mitigasi_bencana_id',
						'faq_bg_mitigasi_bencana.info_wilayah_id',
						'faq_bg_mitigasi_bencana.detail_kdprog_id',
						'faq_bg_mitigasi_bencana.thn_periode_keg',
						'faq_bg_mitigasi_bencana.lokasi_kode',
						'faq_bg_mitigasi_bencana.nama_propinsi',
						'faq_bg_mitigasi_bencana.nama_kabupatenkota',
						'faq_bg_mitigasi_bencana.kd_struktur',
						'faq_bg_mitigasi_bencana.nama_kegiatan',
						'faq_bg_mitigasi_bencana.thn_anggaran',
						'faq_bg_mitigasi_bencana.sumber_anggaran',
						'faq_bg_mitigasi_bencana.alokasi_anggaran',
						'faq_bg_mitigasi_bencana.volume_pekerjaan',
						'faq_bg_mitigasi_bencana.instansi_unit_organisasi_pelaksana',
						'faq_bg_mitigasi_bencana.lokasi_kegiatan_proyek',
						'faq_bg_mitigasi_bencana.titik_koordinat_lat',
						'faq_bg_mitigasi_bencana.titik_koordinat_long',
						'faq_bg_mitigasi_bencana.status_aset',
						'faq_bg_mitigasi_bencana.biaya_pelaksanaan_kontraktor',
						'faq_bg_mitigasi_bencana.manajemen_konstruksi',
						'faq_bg_mitigasi_bencana.rencana_keu',
						'faq_bg_mitigasi_bencana.rencana_fisik',
						'faq_bg_mitigasi_bencana.dokumentasi',
						'faq_bg_mitigasi_bencana.tgl_input_wilayah',
						'faq_bg_mitigasi_bencana.info_wilayah_sk',
						'faq_bg_mitigasi_bencana.last_update',
                        'faq_bg_mitigasi_bencana.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBgMitigasiBencanaTransformer)->transformPaginate($model);
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

        $model->mitigasi_bencana_id = $request->input('mitigasi_bencana_id');
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
                        'faq_bg_mitigasi_bencana.id',
                        'faq_bg_mitigasi_bencana.mitigasi_bencana_id',
						'faq_bg_mitigasi_bencana.info_wilayah_id',
						'faq_bg_mitigasi_bencana.detail_kdprog_id',
						'faq_bg_mitigasi_bencana.thn_periode_keg',
						'faq_bg_mitigasi_bencana.lokasi_kode',
						'faq_bg_mitigasi_bencana.nama_propinsi',
						'faq_bg_mitigasi_bencana.nama_kabupatenkota',
						'faq_bg_mitigasi_bencana.kd_struktur',
						'faq_bg_mitigasi_bencana.nama_kegiatan',
						'faq_bg_mitigasi_bencana.thn_anggaran',
						'faq_bg_mitigasi_bencana.sumber_anggaran',
						'faq_bg_mitigasi_bencana.alokasi_anggaran',
						'faq_bg_mitigasi_bencana.volume_pekerjaan',
						'faq_bg_mitigasi_bencana.instansi_unit_organisasi_pelaksana',
						'faq_bg_mitigasi_bencana.lokasi_kegiatan_proyek',
						'faq_bg_mitigasi_bencana.titik_koordinat_lat',
						'faq_bg_mitigasi_bencana.titik_koordinat_long',
						'faq_bg_mitigasi_bencana.status_aset',
						'faq_bg_mitigasi_bencana.biaya_pelaksanaan_kontraktor',
						'faq_bg_mitigasi_bencana.manajemen_konstruksi',
						'faq_bg_mitigasi_bencana.rencana_keu',
						'faq_bg_mitigasi_bencana.rencana_fisik',
						'faq_bg_mitigasi_bencana.dokumentasi',
						'faq_bg_mitigasi_bencana.tgl_input_wilayah',
						'faq_bg_mitigasi_bencana.info_wilayah_sk',
						'faq_bg_mitigasi_bencana.last_update',
                        'faq_bg_mitigasi_bencana.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_mitigasi_bencana.mitigasi_bencana_id',
						'faq_bg_mitigasi_bencana.info_wilayah_id',
						'faq_bg_mitigasi_bencana.detail_kdprog_id',
						'faq_bg_mitigasi_bencana.thn_periode_keg',
						'faq_bg_mitigasi_bencana.lokasi_kode',
						'faq_bg_mitigasi_bencana.nama_propinsi',
						'faq_bg_mitigasi_bencana.nama_kabupatenkota',
						'faq_bg_mitigasi_bencana.kd_struktur',
						'faq_bg_mitigasi_bencana.nama_kegiatan',
						'faq_bg_mitigasi_bencana.thn_anggaran',
						'faq_bg_mitigasi_bencana.sumber_anggaran',
						'faq_bg_mitigasi_bencana.alokasi_anggaran',
						'faq_bg_mitigasi_bencana.volume_pekerjaan',
						'faq_bg_mitigasi_bencana.instansi_unit_organisasi_pelaksana',
						'faq_bg_mitigasi_bencana.lokasi_kegiatan_proyek',
						'faq_bg_mitigasi_bencana.titik_koordinat_lat',
						'faq_bg_mitigasi_bencana.titik_koordinat_long',
						'faq_bg_mitigasi_bencana.status_aset',
						'faq_bg_mitigasi_bencana.biaya_pelaksanaan_kontraktor',
						'faq_bg_mitigasi_bencana.manajemen_konstruksi',
						'faq_bg_mitigasi_bencana.rencana_keu',
						'faq_bg_mitigasi_bencana.rencana_fisik',
						'faq_bg_mitigasi_bencana.dokumentasi',
						'faq_bg_mitigasi_bencana.tgl_input_wilayah',
						'faq_bg_mitigasi_bencana.info_wilayah_sk',
						'faq_bg_mitigasi_bencana.last_update',
                        'faq_bg_mitigasi_bencana.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBgMitigasiBencanaTransformer)->transformPaginate($model);
    }
}