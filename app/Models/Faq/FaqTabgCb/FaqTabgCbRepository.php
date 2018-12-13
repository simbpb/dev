<?php
namespace App\Models\Faq\FaqTabgCb;

use DB;
use File;

class FaqTabgCbRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-tabg-cb/file-sk-tabg-cb';

      
    public function __construct(
        FaqTabgCb $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_tabg_cb.id',
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    )->searchOrder($request, [
                        'faq_tabg_cb.tabg_cb_id',
						'faq_tabg_cb.info_wilayah_id',
						'faq_tabg_cb.detail_kdprog_id',
						'faq_tabg_cb.thn_periode_keg',
						'faq_tabg_cb.lokasi_kode',
						'faq_tabg_cb.nama_propinsi',
						'faq_tabg_cb.nama_kabupatenkota',
						'faq_tabg_cb.kd_struktur',
						'faq_tabg_cb.no_sk_tabg_cb',
						'faq_tabg_cb.tgl_sk_tabg_cb',
						'faq_tabg_cb.nama_pejabat',
						'faq_tabg_cb.jabatan',
						'faq_tabg_cb.nama_tabg_cb',
						'faq_tabg_cb.no_ktp_tabg_cb',
						'faq_tabg_cb.alamat_tabg_cb',
						'faq_tabg_cb.pendidikan_terakhir_tabg_cb',
						'faq_tabg_cb.jurusan_pendidikan_terakhir',
						'faq_tabg_cb.asal_universitas',
						'faq_tabg_cb.bidang_keahlian',
						'faq_tabg_cb.jabatan_dalam_tim',
						'faq_tabg_cb.keterangan',
						'faq_tabg_cb.file_sk_tabg_cb',
						'faq_tabg_cb.tgl_input_wilayah',
						'faq_tabg_cb.info_wilayah_sk',
						'faq_tabg_cb.last_update',
                        'faq_tabg_cb.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqTabgCbTransformer)->transformPaginate($model);
    }
}