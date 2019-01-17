<?php
namespace App\Models\Faq\FaqTabg;

use DB;
use File;

class FaqTabgRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-tabg/file-sk-tabg';

      
    public function __construct(
        FaqTabg $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_tabg.id',
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqTabgTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_tabg.id',
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg.tabg_id',
						'faq_tabg.info_wilayah_id',
						'faq_tabg.detail_kdprog_id',
						'faq_tabg.thn_periode_keg',
						'faq_tabg.lokasi_kode',
						'faq_tabg.nama_propinsi',
						'faq_tabg.nama_kabupatenkota',
						'faq_tabg.kd_struktur',
						'faq_tabg.no_sk_tabg',
						'faq_tabg.tgl_sk_tabg',
						'faq_tabg.nama_pejabat',
						'faq_tabg.jabatan',
						'faq_tabg.nama_tabg',
						'faq_tabg.no_ktp_tabg',
						'faq_tabg.alamat_tabg',
						'faq_tabg.pendidikan_terakhir_tabg',
						'faq_tabg.jurusan_pendidikan_terakhir',
						'faq_tabg.asal_universitas',
						'faq_tabg.bidang_keahlian',
						'faq_tabg.jabatan_dalam_tim',
						'faq_tabg.keterangan',
						'faq_tabg.file_sk_tabg',
						'faq_tabg.tgl_input_wilayah',
						'faq_tabg.info_wilayah_sk',
						'faq_tabg.last_update',
                        'faq_tabg.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqTabgTransformer)->transformPaginate($model);
    }
}