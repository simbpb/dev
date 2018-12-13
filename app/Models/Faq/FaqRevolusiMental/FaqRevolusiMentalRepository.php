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
}