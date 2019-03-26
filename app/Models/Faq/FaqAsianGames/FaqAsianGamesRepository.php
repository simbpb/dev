<?php
namespace App\Models\Faq\FaqAsianGames;

use DB;
use File;

class FaqAsianGamesRepository
{

    protected $model;
    
      
    public function __construct(
        FaqAsianGames $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_asian_games.id',
                        'faq_asian_games.asian_games_id',
						'faq_asian_games.info_wilayah_id',
						'faq_asian_games.detail_kdprog_id',
						'faq_asian_games.thn_periode_keg',
						'faq_asian_games.lokasi_kode',
						'faq_asian_games.nama_propinsi',
						'faq_asian_games.nama_kabupatenkota',
						'faq_asian_games.kd_struktur',
						'faq_asian_games.nama_kegiatan',
						'faq_asian_games.thn_anggaran',
						'faq_asian_games.sumber_anggaran',
						'faq_asian_games.alokasi_anggaran',
						'faq_asian_games.volume_pekerjaan',
						'faq_asian_games.instansi_unit_organisasi_pelaksana',
						'faq_asian_games.lokasi_kegiatan_proyek',
						'faq_asian_games.titik_koordinat_lat',
						'faq_asian_games.titik_koordinat_long',
						'faq_asian_games.status_aset',
						'faq_asian_games.tgl_input_wilayah',
						'faq_asian_games.info_wilayah_sk',
						'faq_asian_games.last_update',
                        'faq_asian_games.is_actived'
                    )->searchOrder($request, [
                        'faq_asian_games.asian_games_id',
						'faq_asian_games.info_wilayah_id',
						'faq_asian_games.detail_kdprog_id',
						'faq_asian_games.thn_periode_keg',
						'faq_asian_games.lokasi_kode',
						'faq_asian_games.nama_propinsi',
						'faq_asian_games.nama_kabupatenkota',
						'faq_asian_games.kd_struktur',
						'faq_asian_games.nama_kegiatan',
						'faq_asian_games.thn_anggaran',
						'faq_asian_games.sumber_anggaran',
						'faq_asian_games.alokasi_anggaran',
						'faq_asian_games.volume_pekerjaan',
						'faq_asian_games.instansi_unit_organisasi_pelaksana',
						'faq_asian_games.lokasi_kegiatan_proyek',
						'faq_asian_games.titik_koordinat_lat',
						'faq_asian_games.titik_koordinat_long',
						'faq_asian_games.status_aset',
						'faq_asian_games.tgl_input_wilayah',
						'faq_asian_games.info_wilayah_sk',
						'faq_asian_games.last_update',
                        'faq_asian_games.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqAsianGamesTransformer)->transformPaginate($model);
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
        
        
        $model->asian_games_id = $request->input('asian_games_id');
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
                        'faq_asian_games.id',
                        'faq_asian_games.asian_games_id',
						'faq_asian_games.info_wilayah_id',
						'faq_asian_games.detail_kdprog_id',
						'faq_asian_games.thn_periode_keg',
						'faq_asian_games.lokasi_kode',
						'faq_asian_games.nama_propinsi',
						'faq_asian_games.nama_kabupatenkota',
						'faq_asian_games.kd_struktur',
						'faq_asian_games.nama_kegiatan',
						'faq_asian_games.thn_anggaran',
						'faq_asian_games.sumber_anggaran',
						'faq_asian_games.alokasi_anggaran',
						'faq_asian_games.volume_pekerjaan',
						'faq_asian_games.instansi_unit_organisasi_pelaksana',
						'faq_asian_games.lokasi_kegiatan_proyek',
						'faq_asian_games.titik_koordinat_lat',
						'faq_asian_games.titik_koordinat_long',
						'faq_asian_games.status_aset',
						'faq_asian_games.tgl_input_wilayah',
						'faq_asian_games.info_wilayah_sk',
						'faq_asian_games.last_update',
                        'faq_asian_games.is_actived'
                    )->searchOrder($request, [
                        'faq_asian_games.asian_games_id',
						'faq_asian_games.info_wilayah_id',
						'faq_asian_games.detail_kdprog_id',
						'faq_asian_games.thn_periode_keg',
						'faq_asian_games.lokasi_kode',
						'faq_asian_games.nama_propinsi',
						'faq_asian_games.nama_kabupatenkota',
						'faq_asian_games.kd_struktur',
						'faq_asian_games.nama_kegiatan',
						'faq_asian_games.thn_anggaran',
						'faq_asian_games.sumber_anggaran',
						'faq_asian_games.alokasi_anggaran',
						'faq_asian_games.volume_pekerjaan',
						'faq_asian_games.instansi_unit_organisasi_pelaksana',
						'faq_asian_games.lokasi_kegiatan_proyek',
						'faq_asian_games.titik_koordinat_lat',
						'faq_asian_games.titik_koordinat_long',
						'faq_asian_games.status_aset',
						'faq_asian_games.tgl_input_wilayah',
						'faq_asian_games.info_wilayah_sk',
						'faq_asian_games.last_update',
                        'faq_asian_games.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqAsianGamesTransformer)->transformPaginate($model);
    }
}