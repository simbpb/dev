<?php
namespace App\Models\Faq\FaqPengembanganKotaHijau;

use DB;
use File;

class FaqPengembanganKotaHijauRepository
{

    protected $model;
    
      
    public function __construct(
        FaqPengembanganKotaHijau $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengembangan_kota_hijau.id',
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    )->searchOrder($request, [
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPengembanganKotaHijauTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengembangan_kota_hijau.id',
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    )->searchOrder($request, [
                        'faq_pengembangan_kota_hijau.pengembangan_kota_hijau_id',
						'faq_pengembangan_kota_hijau.info_wilayah_id',
						'faq_pengembangan_kota_hijau.detail_kdprog_id',
						'faq_pengembangan_kota_hijau.thn_periode_keg',
						'faq_pengembangan_kota_hijau.lokasi_kode',
						'faq_pengembangan_kota_hijau.nama_propinsi',
						'faq_pengembangan_kota_hijau.nama_kabupatenkota',
						'faq_pengembangan_kota_hijau.kd_struktur',
						'faq_pengembangan_kota_hijau.thn_anggaran',
						'faq_pengembangan_kota_hijau.nama_kegiatan',
						'faq_pengembangan_kota_hijau.attribute_kota_hijau',
						'faq_pengembangan_kota_hijau.thn_penetapan',
						'faq_pengembangan_kota_hijau.sumber_anggaran',
						'faq_pengembangan_kota_hijau.alokasi_anggaran',
						'faq_pengembangan_kota_hijau.volume_pekerjaan',
						'faq_pengembangan_kota_hijau.instansi_unit_organisasi_pelaksana',
						'faq_pengembangan_kota_hijau.lokasi_kegiatan_proyek',
						'faq_pengembangan_kota_hijau.titik_koordinat_lat',
						'faq_pengembangan_kota_hijau.titik_koordinat_long',
						'faq_pengembangan_kota_hijau.status_aset',
						'faq_pengembangan_kota_hijau.tgl_input_wilayah',
						'faq_pengembangan_kota_hijau.info_wilayah_sk',
						'faq_pengembangan_kota_hijau.last_update',
                        'faq_pengembangan_kota_hijau.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPengembanganKotaHijauTransformer)->transformPaginate($model);
    }
}