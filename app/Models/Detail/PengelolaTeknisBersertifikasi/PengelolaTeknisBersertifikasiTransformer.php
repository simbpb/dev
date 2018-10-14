<?php
namespace App\Models\Detail\PengelolaTeknisBersertifikasi;

use App\Enum\Status;

class PengelolaTeknisBersertifikasiTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'No_sertifikat_pengelola_teknis' => $model->No_sertifikat_pengelola_teknis,
'Tgl_sertifikat_pengelola_teknis' => $model->Tgl_sertifikat_pengelola_teknis,
'Nama_Pejabat' => $model->Nama_Pejabat,
'Jabatan' => $model->Jabatan,
'Nama_pengelola_teknis' => $model->Nama_pengelola_teknis,
'No_KTP_pengelola_teknis' => $model->No_KTP_pengelola_teknis,
'Dinas_Instansi_asal_Unit_org' => $model->Dinas_Instansi_asal_Unit_org,
'Alamat_lengkap_pengelola_teknis' => $model->Alamat_lengkap_pengelola_teknis,
'Pendidikan_terakhir_pengelola_teknis' => $model->Pendidikan_terakhir_pengelola_teknis,
'Jurusan_Pendidikan_terakhir' => $model->Jurusan_Pendidikan_terakhir,
'Asal_Universitas' => $model->Asal_Universitas,
'Bidang_Keahlian' => $model->Bidang_Keahlian,
'Keterangan' => $model->Keterangan,
'file_Sertifikat_pengelola_teknis' => $model->file_Sertifikat_pengelola_teknis,

            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'lokasi_kode' => $model->lokasi_kode,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'No_sertifikat_pengelola_teknis' => $model->No_sertifikat_pengelola_teknis,
'Tgl_sertifikat_pengelola_teknis' => $model->Tgl_sertifikat_pengelola_teknis,
'Nama_Pejabat' => $model->Nama_Pejabat,
'Jabatan' => $model->Jabatan,
'Nama_pengelola_teknis' => $model->Nama_pengelola_teknis,
'No_KTP_pengelola_teknis' => $model->No_KTP_pengelola_teknis,
'Dinas_Instansi_asal_Unit_org' => $model->Dinas_Instansi_asal_Unit_org,
'Alamat_lengkap_pengelola_teknis' => $model->Alamat_lengkap_pengelola_teknis,
'Pendidikan_terakhir_pengelola_teknis' => $model->Pendidikan_terakhir_pengelola_teknis,
'Jurusan_Pendidikan_terakhir' => $model->Jurusan_Pendidikan_terakhir,
'Asal_Universitas' => $model->Asal_Universitas,
'Bidang_Keahlian' => $model->Bidang_Keahlian,
'Keterangan' => $model->Keterangan,
'file_Sertifikat_pengelola_teknis' => $model->file_Sertifikat_pengelola_teknis,

                'is_actived' => $model->is_actived
            ];
        });

        $result = [
            'totalRow' => $model->total(),
            'perPage' => $model->count(),
            'currentPage' => $model->currentPage(),
            'lastPage' => $model->lastPage(),
            'data' => $data,
        ];

        return $result;
    }
}
