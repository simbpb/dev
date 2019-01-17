<?php
namespace App\Models\Faq\FaqPengelolaTeknisBersertifikasi;

use DB;
use File;

class FaqPengelolaTeknisBersertifikasiRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-pengelola-teknis-bersertifikasi/file-sertifikat-pengelola-teknis';

      
    public function __construct(
        FaqPengelolaTeknisBersertifikasi $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengelola_teknis_bersertifikasi.id',
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqPengelolaTeknisBersertifikasiTransformer)->transformPaginate($model);
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_pengelola_teknis_bersertifikasi.id',
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'faq_pengelola_teknis_bersertifikasi.pengelola_teknis_bersertifikasi_id',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_id',
						'faq_pengelola_teknis_bersertifikasi.detail_kdprog_id',
						'faq_pengelola_teknis_bersertifikasi.thn_periode_keg',
						'faq_pengelola_teknis_bersertifikasi.lokasi_kode',
						'faq_pengelola_teknis_bersertifikasi.nama_propinsi',
						'faq_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
						'faq_pengelola_teknis_bersertifikasi.kd_struktur',
						'faq_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.nama_pejabat',
						'faq_pengelola_teknis_bersertifikasi.jabatan',
						'faq_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'faq_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'faq_pengelola_teknis_bersertifikasi.asal_universitas',
						'faq_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
						'faq_pengelola_teknis_bersertifikasi.tgl_input_wilayah',
						'faq_pengelola_teknis_bersertifikasi.info_wilayah_sk',
						'faq_pengelola_teknis_bersertifikasi.last_update',
                        'faq_pengelola_teknis_bersertifikasi.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqPengelolaTeknisBersertifikasiTransformer)->transformPaginate($model);
    }
}