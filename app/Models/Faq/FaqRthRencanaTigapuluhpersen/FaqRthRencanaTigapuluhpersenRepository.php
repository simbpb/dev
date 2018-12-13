<?php
namespace App\Models\Faq\FaqRthRencanaTigapuluhpersen;

use DB;
use File;

class FaqRthRencanaTigapuluhpersenRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-rth-rencana-tigapuluhpersen/file-dok-rencana-kota-hijau-rakh';

      
    public function __construct(
        FaqRthRencanaTigapuluhpersen $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rth_rencana_tigapuluhpersen.id',
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_rencana_tigapuluhpersen.rth_rencana_tigapuluhpersen_id',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_id',
						'faq_rth_rencana_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_rencana_tigapuluhpersen.thn_periode_keg',
						'faq_rth_rencana_tigapuluhpersen.lokasi_kode',
						'faq_rth_rencana_tigapuluhpersen.nama_propinsi',
						'faq_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_rencana_tigapuluhpersen.kd_struktur',
						'faq_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'faq_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'faq_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'faq_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
						'faq_rth_rencana_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_rencana_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_rencana_tigapuluhpersen.last_update',
                        'faq_rth_rencana_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRthRencanaTigapuluhpersenTransformer)->transformPaginate($model);
    }
}