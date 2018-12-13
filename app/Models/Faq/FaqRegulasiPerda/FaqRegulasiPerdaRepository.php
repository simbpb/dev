<?php
namespace App\Models\Faq\FaqRegulasiPerda;

use DB;
use File;

class FaqRegulasiPerdaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-regulasi-perda/file-perda-bg';
protected $basePath2 = '/files/faqs/faq-regulasi-perda/file-rt-rw';
protected $basePath3 = '/files/faqs/faq-regulasi-perda/file-rd-tr';
protected $basePath4 = '/files/faqs/faq-regulasi-perda/file-perda-cagar-budaya';
protected $basePath5 = '/files/faqs/faq-regulasi-perda/file-perda-rth';
protected $basePath6 = '/files/faqs/faq-regulasi-perda/file-perbup-bgh';
protected $basePath7 = '/files/faqs/faq-regulasi-perda/file-perbup-imb';
protected $basePath8 = '/files/faqs/faq-regulasi-perda/file-perbup-slf';
protected $basePath9 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-1';
protected $basePath10 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-2';
protected $basePath11 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-3';
protected $basePath12 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-4';
protected $basePath13 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-5';
protected $basePath14 = '/files/faqs/faq-regulasi-perda/file-perbup-rtbl-6';

      
    public function __construct(
        FaqRegulasiPerda $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_regulasi_perda.id',
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    )->searchOrder($request, [
                        'faq_regulasi_perda.regulasi_perda_id',
						'faq_regulasi_perda.info_wilayah_id',
						'faq_regulasi_perda.detail_kdprog_id',
						'faq_regulasi_perda.thn_periode_keg',
						'faq_regulasi_perda.lokasi_kode',
						'faq_regulasi_perda.nama_propinsi',
						'faq_regulasi_perda.nama_kabupatenkota',
						'faq_regulasi_perda.kd_struktur',
						'faq_regulasi_perda.perda_bg',
						'faq_regulasi_perda.file_perda_bg',
						'faq_regulasi_perda.perda_rt_rw',
						'faq_regulasi_perda.file_rt_rw',
						'faq_regulasi_perda.perda_rd_tr',
						'faq_regulasi_perda.file_rd_tr',
						'faq_regulasi_perda.perda_cagar_budaya',
						'faq_regulasi_perda.file_perda_cagar_budaya',
						'faq_regulasi_perda.perda_rth',
						'faq_regulasi_perda.file_perda_rth',
						'faq_regulasi_perda.perwal_perbup_bgh',
						'faq_regulasi_perda.file_perbup_bgh',
						'faq_regulasi_perda.perwal_perbup_imb',
						'faq_regulasi_perda.file_perbup_imb',
						'faq_regulasi_perda.perwal_perbup_slf',
						'faq_regulasi_perda.file_perbup_slf',
						'faq_regulasi_perda.perwal_perbup_rtbl_1',
						'faq_regulasi_perda.file_perbup_rtbl_1',
						'faq_regulasi_perda.perwal_perbup_rtbl_2',
						'faq_regulasi_perda.file_perbup_rtbl_2',
						'faq_regulasi_perda.perwal_perbup_rtbl_3',
						'faq_regulasi_perda.file_perbup_rtbl_3',
						'faq_regulasi_perda.perwal_perbup_rtbl_4',
						'faq_regulasi_perda.file_perbup_rtbl_4',
						'faq_regulasi_perda.perwal_perbup_rtbl_5',
						'faq_regulasi_perda.file_perbup_rtbl_5',
						'faq_regulasi_perda.perwal_perbup_rtbl_6',
						'faq_regulasi_perda.file_perbup_rtbl_6',
						'faq_regulasi_perda.tgl_input_wilayah',
						'faq_regulasi_perda.info_wilayah_sk',
						'faq_regulasi_perda.last_update',
                        'faq_regulasi_perda.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRegulasiPerdaTransformer)->transformPaginate($model);
    }
}