<?php
namespace App\Models\Faq\FaqPelepasanRng3;

use DB;
use File;

class FaqPelepasanRng3Repository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-gol3';
protected $basePath2 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sip-gol3';
protected $basePath3 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-menteri-pupr';
protected $basePath4 = '/files/faqs/faq-pelepasan-rng-3/file-upload-sk-hak-milik';

      
    public function __construct(
        FaqPelepasanRng3 $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pelepasan_rng3.id',
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    )->searchOrder($request, [
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPelepasanRng3Transformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pelepasan_rng3.id',
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    )->searchOrder($request, [
                        'faq_pelepasan_rng3.pelepasan_rng3_id',
						'faq_pelepasan_rng3.info_wilayah_id',
						'faq_pelepasan_rng3.detail_kdprog_id',
						'faq_pelepasan_rng3.thn_periode_keg',
						'faq_pelepasan_rng3.lokasi_kode',
						'faq_pelepasan_rng3.hdno_rn',
						'faq_pelepasan_rng3.nama_propinsi',
						'faq_pelepasan_rng3.nama_kabupatenkota',
						'faq_pelepasan_rng3.nama_kecamatan',
						'faq_pelepasan_rng3.kd_struktur',
						'faq_pelepasan_rng3.kemen_lembaga',
						'faq_pelepasan_rng3.nama_penghuni',
						'faq_pelepasan_rng3.alamat_rn',
						'faq_pelepasan_rng3.no_sk_gol3',
						'faq_pelepasan_rng3.file_upload_sk_gol3',
						'faq_pelepasan_rng3.no_sip_gol3',
						'faq_pelepasan_rng3.file_upload_sip_gol3',
						'faq_pelepasan_rng3.no_sk_menteri_pupr',
						'faq_pelepasan_rng3.file_upload_sk_menteri_pupr',
						'faq_pelepasan_rng3.thn_perjanjian_sewabeli',
						'faq_pelepasan_rng3.status_rn',
						'faq_pelepasan_rng3.thn_pelepasan_rng3',
						'faq_pelepasan_rng3.sk_hak_milik',
						'faq_pelepasan_rng3.file_upload_sk_hak_milik',
						'faq_pelepasan_rng3.tgl_input_wilayah',
						'faq_pelepasan_rng3.info_wilayah_sk',
						'faq_pelepasan_rng3.last_update',
                        'faq_pelepasan_rng3.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPelepasanRng3Transformer)->transformPaginate($model);
    }
}