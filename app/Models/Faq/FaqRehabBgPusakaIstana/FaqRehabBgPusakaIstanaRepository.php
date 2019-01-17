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