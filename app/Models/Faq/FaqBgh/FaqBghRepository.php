<?php
namespace App\Models\Faq\FaqBgh;

use DB;
use File;

class FaqBghRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bgh/file-upload-sertifikat-bgh';
protected $basePath2 = '/files/faqs/faq-bgh/file-upload-sertifikat-pemanfaatan-bgh';

      
    public function __construct(
        FaqBgh $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bgh.id',
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    )->searchOrder($request, [
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBghTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bgh.id',
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    )->searchOrder($request, [
                        'faq_bgh.bgh_id',
						'faq_bgh.info_wilayah_id',
						'faq_bgh.detail_kdprog_id',
						'faq_bgh.thn_periode_keg',
						'faq_bgh.lokasi_kode',
						'faq_bgh.nama_propinsi',
						'faq_bgh.nama_kabupatenkota',
						'faq_bgh.kd_struktur',
						'faq_bgh.nama_kegiatan',
						'faq_bgh.thn_anggaran',
						'faq_bgh.sumber_anggaran',
						'faq_bgh.alokasi_anggaran',
						'faq_bgh.volume_pekerjaan',
						'faq_bgh.instansi_unit_organisasi_pelaksana',
						'faq_bgh.lokasi_kegiatan_proyek',
						'faq_bgh.titik_koordinat_lat',
						'faq_bgh.titik_koordinat_long',
						'faq_bgh.status_aset',
						'faq_bgh.nama_kepala_dinas',
						'faq_bgh.nama_pengelola',
						'faq_bgh.nama_penyedia_jasa_perencanaan',
						'faq_bgh.thn_penerbitan_sertifikat_bgh',
						'faq_bgh.no_sertifikat_bgh',
						'faq_bgh.file_upload_sertifikat_bgh',
						'faq_bgh.no_plakat_bgh',
						'faq_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
						'faq_bgh.file_upload_sertifikat_pemanfaatan_bgh',
						'faq_bgh.peringkat_bgh',
						'faq_bgh.pemanfaatan_ke',
						'faq_bgh.tgl_input_wilayah',
						'faq_bgh.info_wilayah_sk',
						'faq_bgh.last_update',
                        'faq_bgh.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBghTransformer)->transformPaginate($model);
    }
}