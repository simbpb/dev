<?php
namespace App\Models\Faq\FaqKwsPusakaPemukimanTrad;

use DB;
use File;

class FaqKwsPusakaPemukimanTradRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-kws-pusaka-pemukiman-trad/dokumentasi';

      
    public function __construct(
        FaqKwsPusakaPemukimanTrad $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_pusaka_pemukiman_trad.id',
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_pusaka_pemukiman_trad.kws_pusaka_trad_id',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_id',
						'faq_kws_pusaka_pemukiman_trad.detail_kdprog_id',
						'faq_kws_pusaka_pemukiman_trad.thn_periode_keg',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kode',
						'faq_kws_pusaka_pemukiman_trad.nama_propinsi',
						'faq_kws_pusaka_pemukiman_trad.nama_kabupatenkota',
						'faq_kws_pusaka_pemukiman_trad.kd_struktur',
						'faq_kws_pusaka_pemukiman_trad.nama_kawasan',
						'faq_kws_pusaka_pemukiman_trad.jenis_kawasan',
						'faq_kws_pusaka_pemukiman_trad.nama_kegiatan',
						'faq_kws_pusaka_pemukiman_trad.thn_anggaran',
						'faq_kws_pusaka_pemukiman_trad.sumber_anggaran',
						'faq_kws_pusaka_pemukiman_trad.alokasi_anggaran',
						'faq_kws_pusaka_pemukiman_trad.volume_pekerjaan',
						'faq_kws_pusaka_pemukiman_trad.instansi_unit_organisasi_pelaksana',
						'faq_kws_pusaka_pemukiman_trad.lokasi_kegiatan_proyek',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_lat',
						'faq_kws_pusaka_pemukiman_trad.titik_koordinat_long',
						'faq_kws_pusaka_pemukiman_trad.status_aset',
						'faq_kws_pusaka_pemukiman_trad.biaya_pelaksanaan_kontraktor',
						'faq_kws_pusaka_pemukiman_trad.manajemen_konstruksi',
						'faq_kws_pusaka_pemukiman_trad.rencana_keu',
						'faq_kws_pusaka_pemukiman_trad.rencana_fisik',
						'faq_kws_pusaka_pemukiman_trad.dokumentasi',
						'faq_kws_pusaka_pemukiman_trad.tgl_input_wilayah',
						'faq_kws_pusaka_pemukiman_trad.info_wilayah_sk',
						'faq_kws_pusaka_pemukiman_trad.last_update',
                        'faq_kws_pusaka_pemukiman_trad.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsPusakaPemukimanTradTransformer)->transformPaginate($model);
    }
}