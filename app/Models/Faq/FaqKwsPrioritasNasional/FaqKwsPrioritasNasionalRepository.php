<?php
namespace App\Models\Faq\FaqKwsPrioritasNasional;

use DB;
use File;

class FaqKwsPrioritasNasionalRepository
{

    protected $model;
    
      
    public function __construct(
        FaqKwsPrioritasNasional $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_prioritas_nasional.id',
                        'faq_kws_prioritas_nasional.kws_prioritas_nasional_id',
						'faq_kws_prioritas_nasional.info_wilayah_id',
						'faq_kws_prioritas_nasional.detail_kdprog_id',
						'faq_kws_prioritas_nasional.thn_periode_keg',
						'faq_kws_prioritas_nasional.lokasi_kode',
						'faq_kws_prioritas_nasional.nama_propinsi',
						'faq_kws_prioritas_nasional.nama_kabupatenkota',
						'faq_kws_prioritas_nasional.kd_struktur',
						'faq_kws_prioritas_nasional.nama_kegiatan',
						'faq_kws_prioritas_nasional.thn_anggaran',
						'faq_kws_prioritas_nasional.sumber_anggaran',
						'faq_kws_prioritas_nasional.alokasi_anggaran',
						'faq_kws_prioritas_nasional.volume_pekerjaan',
						'faq_kws_prioritas_nasional.instansi_unit_organisasi_pelaksana',
						'faq_kws_prioritas_nasional.lokasi_kegiatan_proyek',
						'faq_kws_prioritas_nasional.titik_koordinat_lat',
						'faq_kws_prioritas_nasional.titik_koordinat_long',
						'faq_kws_prioritas_nasional.status_aset',
						'faq_kws_prioritas_nasional.tgl_input_wilayah',
						'faq_kws_prioritas_nasional.info_wilayah_sk',
						'faq_kws_prioritas_nasional.last_update',
                        'faq_kws_prioritas_nasional.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_prioritas_nasional.kws_prioritas_nasional_id',
						'faq_kws_prioritas_nasional.info_wilayah_id',
						'faq_kws_prioritas_nasional.detail_kdprog_id',
						'faq_kws_prioritas_nasional.thn_periode_keg',
						'faq_kws_prioritas_nasional.lokasi_kode',
						'faq_kws_prioritas_nasional.nama_propinsi',
						'faq_kws_prioritas_nasional.nama_kabupatenkota',
						'faq_kws_prioritas_nasional.kd_struktur',
						'faq_kws_prioritas_nasional.nama_kegiatan',
						'faq_kws_prioritas_nasional.thn_anggaran',
						'faq_kws_prioritas_nasional.sumber_anggaran',
						'faq_kws_prioritas_nasional.alokasi_anggaran',
						'faq_kws_prioritas_nasional.volume_pekerjaan',
						'faq_kws_prioritas_nasional.instansi_unit_organisasi_pelaksana',
						'faq_kws_prioritas_nasional.lokasi_kegiatan_proyek',
						'faq_kws_prioritas_nasional.titik_koordinat_lat',
						'faq_kws_prioritas_nasional.titik_koordinat_long',
						'faq_kws_prioritas_nasional.status_aset',
						'faq_kws_prioritas_nasional.tgl_input_wilayah',
						'faq_kws_prioritas_nasional.info_wilayah_sk',
						'faq_kws_prioritas_nasional.last_update',
                        'faq_kws_prioritas_nasional.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsPrioritasNasionalTransformer)->transformPaginate($model);
    }
}