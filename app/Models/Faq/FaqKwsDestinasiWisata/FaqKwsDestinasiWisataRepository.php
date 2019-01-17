<?php
namespace App\Models\Faq\FaqKwsDestinasiWisata;

use DB;
use File;

class FaqKwsDestinasiWisataRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-kws-destinasi-wisata/dokumentasi';

      
    public function __construct(
        FaqKwsDestinasiWisata $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_destinasi_wisata.id',
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqKwsDestinasiWisataTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_kws_destinasi_wisata.id',
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    )->searchOrder($request, [
                        'faq_kws_destinasi_wisata.kws_destinasi_wisata_id',
						'faq_kws_destinasi_wisata.info_wilayah_id',
						'faq_kws_destinasi_wisata.detail_kdprog_id',
						'faq_kws_destinasi_wisata.thn_periode_keg',
						'faq_kws_destinasi_wisata.lokasi_kode',
						'faq_kws_destinasi_wisata.nama_propinsi',
						'faq_kws_destinasi_wisata.nama_kabupatenkota',
						'faq_kws_destinasi_wisata.kd_struktur',
						'faq_kws_destinasi_wisata.lokasi_berada_di_kawasan',
						'faq_kws_destinasi_wisata.nama_kawasan',
						'faq_kws_destinasi_wisata.nama_kegiatan',
						'faq_kws_destinasi_wisata.thn_anggaran',
						'faq_kws_destinasi_wisata.sumber_anggaran',
						'faq_kws_destinasi_wisata.alokasi_anggaran',
						'faq_kws_destinasi_wisata.volume_pekerjaan',
						'faq_kws_destinasi_wisata.instansi_unit_organisasi_pelaksana',
						'faq_kws_destinasi_wisata.lokasi_kegiatan_proyek',
						'faq_kws_destinasi_wisata.titik_koordinat_lat',
						'faq_kws_destinasi_wisata.titik_koordinat_long',
						'faq_kws_destinasi_wisata.status_aset',
						'faq_kws_destinasi_wisata.biaya_pelaksanaan_kontraktor',
						'faq_kws_destinasi_wisata.manajemen_konstruksi',
						'faq_kws_destinasi_wisata.rencana_keu',
						'faq_kws_destinasi_wisata.rencana_fisik',
						'faq_kws_destinasi_wisata.dokumentasi',
						'faq_kws_destinasi_wisata.tgl_input_wilayah',
						'faq_kws_destinasi_wisata.info_wilayah_sk',
						'faq_kws_destinasi_wisata.last_update',
                        'faq_kws_destinasi_wisata.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqKwsDestinasiWisataTransformer)->transformPaginate($model);
    }
}