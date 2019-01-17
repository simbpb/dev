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