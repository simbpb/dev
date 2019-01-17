<?php
namespace App\Models\Faq\FaqRthStatusTigapuluhpersen;

use DB;
use File;

class FaqRthStatusTigapuluhpersenRepository
{

    protected $model;
    
      
    public function __construct(
        FaqRthStatusTigapuluhpersen $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rth_status_tigapuluhpersen.id',
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRthStatusTigapuluhpersenTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rth_status_tigapuluhpersen.id',
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRthStatusTigapuluhpersenTransformer)->transformPaginate($model);
    }
}