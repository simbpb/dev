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