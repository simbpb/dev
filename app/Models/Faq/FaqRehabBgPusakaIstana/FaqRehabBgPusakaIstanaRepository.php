<?php
namespace App\Models\Faq\FaqRehabBgPusakaIstana;

use DB;
use File;

class FaqRehabBgPusakaIstanaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-rehab-bg-pusaka-istana/dokumentasi';

      
    public function __construct(
        FaqRehabBgPusakaIstana $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rehab_bg_pusaka_istana.id',
                        'faq_rehab_bg_pusaka_istana.rehab_pusaka_istana_id',
						'faq_rehab_bg_pusaka_istana.info_wilayah_id',
						'faq_rehab_bg_pusaka_istana.detail_kdprog_id',
						'faq_rehab_bg_pusaka_istana.thn_periode_keg',
						'faq_rehab_bg_pusaka_istana.lokasi_kode',
						'faq_rehab_bg_pusaka_istana.nama_propinsi',
						'faq_rehab_bg_pusaka_istana.nama_kabupatenkota',
						'faq_rehab_bg_pusaka_istana.kd_struktur',
						'faq_rehab_bg_pusaka_istana.nama_kegiatan',
						'faq_rehab_bg_pusaka_istana.thn_anggaran',
						'faq_rehab_bg_pusaka_istana.sumber_anggaran',
						'faq_rehab_bg_pusaka_istana.alokasi_anggaran',
						'faq_rehab_bg_pusaka_istana.volume_pekerjaan',
						'faq_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'faq_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_long',
						'faq_rehab_bg_pusaka_istana.status_aset',
						'faq_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'faq_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'faq_rehab_bg_pusaka_istana.rencana_keu',
						'faq_rehab_bg_pusaka_istana.rencana_fisik',
						'faq_rehab_bg_pusaka_istana.dokumentasi',
						'faq_rehab_bg_pusaka_istana.tgl_input_wilayah',
						'faq_rehab_bg_pusaka_istana.info_wilayah_sk',
						'faq_rehab_bg_pusaka_istana.last_update',
                        'faq_rehab_bg_pusaka_istana.is_actived'
                    )->searchOrder($request, [
                        'faq_rehab_bg_pusaka_istana.rehab_pusaka_istana_id',
						'faq_rehab_bg_pusaka_istana.info_wilayah_id',
						'faq_rehab_bg_pusaka_istana.detail_kdprog_id',
						'faq_rehab_bg_pusaka_istana.thn_periode_keg',
						'faq_rehab_bg_pusaka_istana.lokasi_kode',
						'faq_rehab_bg_pusaka_istana.nama_propinsi',
						'faq_rehab_bg_pusaka_istana.nama_kabupatenkota',
						'faq_rehab_bg_pusaka_istana.kd_struktur',
						'faq_rehab_bg_pusaka_istana.nama_kegiatan',
						'faq_rehab_bg_pusaka_istana.thn_anggaran',
						'faq_rehab_bg_pusaka_istana.sumber_anggaran',
						'faq_rehab_bg_pusaka_istana.alokasi_anggaran',
						'faq_rehab_bg_pusaka_istana.volume_pekerjaan',
						'faq_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'faq_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_long',
						'faq_rehab_bg_pusaka_istana.status_aset',
						'faq_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'faq_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'faq_rehab_bg_pusaka_istana.rencana_keu',
						'faq_rehab_bg_pusaka_istana.rencana_fisik',
						'faq_rehab_bg_pusaka_istana.dokumentasi',
						'faq_rehab_bg_pusaka_istana.tgl_input_wilayah',
						'faq_rehab_bg_pusaka_istana.info_wilayah_sk',
						'faq_rehab_bg_pusaka_istana.last_update',
                        'faq_rehab_bg_pusaka_istana.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRehabBgPusakaIstanaTransformer)->transformPaginate($model);
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

        $model->rehab_pusaka_istana_id = $request->input('rehab_pusaka_istana_id');
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
                        'faq_rehab_bg_pusaka_istana.id',
                        'faq_rehab_bg_pusaka_istana.rehab_pusaka_istana_id',
						'faq_rehab_bg_pusaka_istana.info_wilayah_id',
						'faq_rehab_bg_pusaka_istana.detail_kdprog_id',
						'faq_rehab_bg_pusaka_istana.thn_periode_keg',
						'faq_rehab_bg_pusaka_istana.lokasi_kode',
						'faq_rehab_bg_pusaka_istana.nama_propinsi',
						'faq_rehab_bg_pusaka_istana.nama_kabupatenkota',
						'faq_rehab_bg_pusaka_istana.kd_struktur',
						'faq_rehab_bg_pusaka_istana.nama_kegiatan',
						'faq_rehab_bg_pusaka_istana.thn_anggaran',
						'faq_rehab_bg_pusaka_istana.sumber_anggaran',
						'faq_rehab_bg_pusaka_istana.alokasi_anggaran',
						'faq_rehab_bg_pusaka_istana.volume_pekerjaan',
						'faq_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'faq_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_long',
						'faq_rehab_bg_pusaka_istana.status_aset',
						'faq_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'faq_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'faq_rehab_bg_pusaka_istana.rencana_keu',
						'faq_rehab_bg_pusaka_istana.rencana_fisik',
						'faq_rehab_bg_pusaka_istana.dokumentasi',
						'faq_rehab_bg_pusaka_istana.tgl_input_wilayah',
						'faq_rehab_bg_pusaka_istana.info_wilayah_sk',
						'faq_rehab_bg_pusaka_istana.last_update',
                        'faq_rehab_bg_pusaka_istana.is_actived'
                    )->searchOrder($request, [
                        'faq_rehab_bg_pusaka_istana.rehab_pusaka_istana_id',
						'faq_rehab_bg_pusaka_istana.info_wilayah_id',
						'faq_rehab_bg_pusaka_istana.detail_kdprog_id',
						'faq_rehab_bg_pusaka_istana.thn_periode_keg',
						'faq_rehab_bg_pusaka_istana.lokasi_kode',
						'faq_rehab_bg_pusaka_istana.nama_propinsi',
						'faq_rehab_bg_pusaka_istana.nama_kabupatenkota',
						'faq_rehab_bg_pusaka_istana.kd_struktur',
						'faq_rehab_bg_pusaka_istana.nama_kegiatan',
						'faq_rehab_bg_pusaka_istana.thn_anggaran',
						'faq_rehab_bg_pusaka_istana.sumber_anggaran',
						'faq_rehab_bg_pusaka_istana.alokasi_anggaran',
						'faq_rehab_bg_pusaka_istana.volume_pekerjaan',
						'faq_rehab_bg_pusaka_istana.instansi_unit_organisasi_pelaksana',
						'faq_rehab_bg_pusaka_istana.lokasi_kegiatan_proyek',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_lat',
						'faq_rehab_bg_pusaka_istana.titik_koordinat_long',
						'faq_rehab_bg_pusaka_istana.status_aset',
						'faq_rehab_bg_pusaka_istana.biaya_pelaksanaan_kontraktor',
						'faq_rehab_bg_pusaka_istana.manajemen_konstruksi',
						'faq_rehab_bg_pusaka_istana.rencana_keu',
						'faq_rehab_bg_pusaka_istana.rencana_fisik',
						'faq_rehab_bg_pusaka_istana.dokumentasi',
						'faq_rehab_bg_pusaka_istana.tgl_input_wilayah',
						'faq_rehab_bg_pusaka_istana.info_wilayah_sk',
						'faq_rehab_bg_pusaka_istana.last_update',
                        'faq_rehab_bg_pusaka_istana.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRehabBgPusakaIstanaTransformer)->transformPaginate($model);
    }
}