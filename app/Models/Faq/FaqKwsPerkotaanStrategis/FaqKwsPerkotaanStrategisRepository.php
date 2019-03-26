<?php
namespace App\Models\Faq\FaqKwsPerkotaanStrategis;

use DB;
use File;

class FaqKwsPerkotaanStrategisRepository
{

    protected $model;
    
      
    public function __construct(
        FaqKwsPerkotaanStrategis $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_perkotaan_strategis.id',
                        'faq_kws_perkotaan_strategis.kws_perkotaan_strategis_id',
						'faq_kws_perkotaan_strategis.info_wilayah_id',
						'faq_kws_perkotaan_strategis.detail_kdprog_id',
						'faq_kws_perkotaan_strategis.thn_periode_keg',
						'faq_kws_perkotaan_strategis.lokasi_kode',
						'faq_kws_perkotaan_strategis.nama_propinsi',
						'faq_kws_perkotaan_strategis.nama_kabupatenkota',
						'faq_kws_perkotaan_strategis.kd_struktur',
						'faq_kws_perkotaan_strategis.nama_kws_perkotaan',
						'faq_kws_perkotaan_strategis.nama_kegiatan',
						'faq_kws_perkotaan_strategis.thn_anggaran',
						'faq_kws_perkotaan_strategis.sumber_anggaran',
						'faq_kws_perkotaan_strategis.alokasi_anggaran',
						'faq_kws_perkotaan_strategis.volume_pekerjaan',
						'faq_kws_perkotaan_strategis.instansi_unit_organisasi_pelaksana',
						'faq_kws_perkotaan_strategis.lokasi_kegiatan_proyek',
						'faq_kws_perkotaan_strategis.titik_koordinat_lat',
						'faq_kws_perkotaan_strategis.titik_koordinat_long',
						'faq_kws_perkotaan_strategis.status_aset',
						'faq_kws_perkotaan_strategis.tgl_input_wilayah',
						'faq_kws_perkotaan_strategis.info_wilayah_sk',
						'faq_kws_perkotaan_strategis.last_update',
                        'faq_kws_perkotaan_strategis.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_perkotaan_strategis.kws_perkotaan_strategis_id',
						'faq_kws_perkotaan_strategis.info_wilayah_id',
						'faq_kws_perkotaan_strategis.detail_kdprog_id',
						'faq_kws_perkotaan_strategis.thn_periode_keg',
						'faq_kws_perkotaan_strategis.lokasi_kode',
						'faq_kws_perkotaan_strategis.nama_propinsi',
						'faq_kws_perkotaan_strategis.nama_kabupatenkota',
						'faq_kws_perkotaan_strategis.kd_struktur',
						'faq_kws_perkotaan_strategis.nama_kws_perkotaan',
						'faq_kws_perkotaan_strategis.nama_kegiatan',
						'faq_kws_perkotaan_strategis.thn_anggaran',
						'faq_kws_perkotaan_strategis.sumber_anggaran',
						'faq_kws_perkotaan_strategis.alokasi_anggaran',
						'faq_kws_perkotaan_strategis.volume_pekerjaan',
						'faq_kws_perkotaan_strategis.instansi_unit_organisasi_pelaksana',
						'faq_kws_perkotaan_strategis.lokasi_kegiatan_proyek',
						'faq_kws_perkotaan_strategis.titik_koordinat_lat',
						'faq_kws_perkotaan_strategis.titik_koordinat_long',
						'faq_kws_perkotaan_strategis.status_aset',
						'faq_kws_perkotaan_strategis.tgl_input_wilayah',
						'faq_kws_perkotaan_strategis.info_wilayah_sk',
						'faq_kws_perkotaan_strategis.last_update',
                        'faq_kws_perkotaan_strategis.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsPerkotaanStrategisTransformer)->transformPaginate($model);
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
        
        
        $model->kws_perkotaan_strategis_id = $request->input('kws_perkotaan_strategis_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->nama_kws_perkotaan = $request->input('nama_kws_perkotaan');
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
                        'faq_kws_perkotaan_strategis.id',
                        'faq_kws_perkotaan_strategis.kws_perkotaan_strategis_id',
						'faq_kws_perkotaan_strategis.info_wilayah_id',
						'faq_kws_perkotaan_strategis.detail_kdprog_id',
						'faq_kws_perkotaan_strategis.thn_periode_keg',
						'faq_kws_perkotaan_strategis.lokasi_kode',
						'faq_kws_perkotaan_strategis.nama_propinsi',
						'faq_kws_perkotaan_strategis.nama_kabupatenkota',
						'faq_kws_perkotaan_strategis.kd_struktur',
						'faq_kws_perkotaan_strategis.nama_kws_perkotaan',
						'faq_kws_perkotaan_strategis.nama_kegiatan',
						'faq_kws_perkotaan_strategis.thn_anggaran',
						'faq_kws_perkotaan_strategis.sumber_anggaran',
						'faq_kws_perkotaan_strategis.alokasi_anggaran',
						'faq_kws_perkotaan_strategis.volume_pekerjaan',
						'faq_kws_perkotaan_strategis.instansi_unit_organisasi_pelaksana',
						'faq_kws_perkotaan_strategis.lokasi_kegiatan_proyek',
						'faq_kws_perkotaan_strategis.titik_koordinat_lat',
						'faq_kws_perkotaan_strategis.titik_koordinat_long',
						'faq_kws_perkotaan_strategis.status_aset',
						'faq_kws_perkotaan_strategis.tgl_input_wilayah',
						'faq_kws_perkotaan_strategis.info_wilayah_sk',
						'faq_kws_perkotaan_strategis.last_update',
                        'faq_kws_perkotaan_strategis.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_perkotaan_strategis.kws_perkotaan_strategis_id',
						'faq_kws_perkotaan_strategis.info_wilayah_id',
						'faq_kws_perkotaan_strategis.detail_kdprog_id',
						'faq_kws_perkotaan_strategis.thn_periode_keg',
						'faq_kws_perkotaan_strategis.lokasi_kode',
						'faq_kws_perkotaan_strategis.nama_propinsi',
						'faq_kws_perkotaan_strategis.nama_kabupatenkota',
						'faq_kws_perkotaan_strategis.kd_struktur',
						'faq_kws_perkotaan_strategis.nama_kws_perkotaan',
						'faq_kws_perkotaan_strategis.nama_kegiatan',
						'faq_kws_perkotaan_strategis.thn_anggaran',
						'faq_kws_perkotaan_strategis.sumber_anggaran',
						'faq_kws_perkotaan_strategis.alokasi_anggaran',
						'faq_kws_perkotaan_strategis.volume_pekerjaan',
						'faq_kws_perkotaan_strategis.instansi_unit_organisasi_pelaksana',
						'faq_kws_perkotaan_strategis.lokasi_kegiatan_proyek',
						'faq_kws_perkotaan_strategis.titik_koordinat_lat',
						'faq_kws_perkotaan_strategis.titik_koordinat_long',
						'faq_kws_perkotaan_strategis.status_aset',
						'faq_kws_perkotaan_strategis.tgl_input_wilayah',
						'faq_kws_perkotaan_strategis.info_wilayah_sk',
						'faq_kws_perkotaan_strategis.last_update',
                        'faq_kws_perkotaan_strategis.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqKwsPerkotaanStrategisTransformer)->transformPaginate($model);
    }
}