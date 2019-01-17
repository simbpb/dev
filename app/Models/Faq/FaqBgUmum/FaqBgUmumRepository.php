<?php
namespace App\Models\Faq\FaqBgUmum;

use DB;
use File;

class FaqBgUmumRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bg-umum/file-imb';
protected $basePath2 = '/files/faqs/faq-bg-umum/file-slf';

      
    public function __construct(
        FaqBgUmum $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_umum.id',
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBgUmumTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_umum.id',
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBgUmumTransformer)->transformPaginate($model);
    }
}