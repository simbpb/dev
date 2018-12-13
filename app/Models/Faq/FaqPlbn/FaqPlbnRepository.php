<?php
namespace App\Models\Faq\FaqPlbn;

use DB;
use File;

class FaqPlbnRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-plbn/dokumentasi';

      
    public function __construct(
        FaqPlbn $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_plbn.id',
                        'faq_plbn.plbn_id',
						'faq_plbn.info_wilayah_id',
						'faq_plbn.detail_kdprog_id',
						'faq_plbn.thn_periode_keg',
						'faq_plbn.lokasi_kode',
						'faq_plbn.nama_propinsi',
						'faq_plbn.nama_kabupatenkota',
						'faq_plbn.kd_struktur',
						'faq_plbn.nama_kegiatan',
						'faq_plbn.thn_anggaran',
						'faq_plbn.sumber_anggaran',
						'faq_plbn.alokasi_anggaran',
						'faq_plbn.volume_pekerjaan',
						'faq_plbn.instansi_unit_organisasi_pelaksana',
						'faq_plbn.lokasi_kegiatan_proyek',
						'faq_plbn.titik_koordinat_lat',
						'faq_plbn.titik_koordinat_long',
						'faq_plbn.status_aset',
						'faq_plbn.biaya_pelaksanaan_kontraktor',
						'faq_plbn.manajemen_konstruksi',
						'faq_plbn.rencana_keu',
						'faq_plbn.rencana_fisik',
						'faq_plbn.dokumentasi',
						'faq_plbn.tgl_input_wilayah',
						'faq_plbn.info_wilayah_sk',
						'faq_plbn.last_update',
                        'faq_plbn.is_actived'
                    )->searchOrder($request, [
                        'faq_plbn.plbn_id',
						'faq_plbn.info_wilayah_id',
						'faq_plbn.detail_kdprog_id',
						'faq_plbn.thn_periode_keg',
						'faq_plbn.lokasi_kode',
						'faq_plbn.nama_propinsi',
						'faq_plbn.nama_kabupatenkota',
						'faq_plbn.kd_struktur',
						'faq_plbn.nama_kegiatan',
						'faq_plbn.thn_anggaran',
						'faq_plbn.sumber_anggaran',
						'faq_plbn.alokasi_anggaran',
						'faq_plbn.volume_pekerjaan',
						'faq_plbn.instansi_unit_organisasi_pelaksana',
						'faq_plbn.lokasi_kegiatan_proyek',
						'faq_plbn.titik_koordinat_lat',
						'faq_plbn.titik_koordinat_long',
						'faq_plbn.status_aset',
						'faq_plbn.biaya_pelaksanaan_kontraktor',
						'faq_plbn.manajemen_konstruksi',
						'faq_plbn.rencana_keu',
						'faq_plbn.rencana_fisik',
						'faq_plbn.dokumentasi',
						'faq_plbn.tgl_input_wilayah',
						'faq_plbn.info_wilayah_sk',
						'faq_plbn.last_update',
                        'faq_plbn.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPlbnTransformer)->transformPaginate($model);
    }
}