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