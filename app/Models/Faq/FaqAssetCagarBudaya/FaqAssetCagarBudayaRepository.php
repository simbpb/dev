<?php
namespace App\Models\Faq\FaqAssetCagarBudaya;

use DB;
use File;

class FaqAssetCagarBudayaRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-asset-cagar-budaya/file-sk-penetapan-cagar-budaya';

      
    public function __construct(
        FaqAssetCagarBudaya $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_asset_cagar_budaya.id',
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    )->searchOrder($request, [
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqAssetCagarBudayaTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_asset_cagar_budaya.id',
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    )->searchOrder($request, [
                        'faq_asset_cagar_budaya.cagar_budaya_id',
						'faq_asset_cagar_budaya.info_wilayah_id',
						'faq_asset_cagar_budaya.detail_kdprog_id',
						'faq_asset_cagar_budaya.thn_periode_keg',
						'faq_asset_cagar_budaya.lokasi_kode',
						'faq_asset_cagar_budaya.nama_propinsi',
						'faq_asset_cagar_budaya.nama_kabupatenkota',
						'faq_asset_cagar_budaya.kd_struktur',
						'faq_asset_cagar_budaya.nama_aset_cagar_budaya',
						'faq_asset_cagar_budaya.klasifikasi_cagar_budaya',
						'faq_asset_cagar_budaya.nama_instansi_cagar_budaya',
						'faq_asset_cagar_budaya.lokasi_cagar_budaya',
						'faq_asset_cagar_budaya.sk_penetapan',
						'faq_asset_cagar_budaya.file_sk_penetapan_cagar_budaya',
						'faq_asset_cagar_budaya.tahun_penetapan',
						'faq_asset_cagar_budaya.tgl_input_wilayah',
						'faq_asset_cagar_budaya.info_wilayah_sk',
						'faq_asset_cagar_budaya.last_update',
                        'faq_asset_cagar_budaya.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqAssetCagarBudayaTransformer)->transformPaginate($model);
    }
}