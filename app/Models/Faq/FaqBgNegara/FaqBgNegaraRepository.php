<?php
namespace App\Models\Faq\FaqBgNegara;

use DB;
use File;

class FaqBgNegaraRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bg-negara/dokumentasi';

      
    public function __construct(
        FaqBgNegara $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_negara.id',
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBgNegaraTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_negara.id',
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBgNegaraTransformer)->transformPaginate($model);
    }
}