<?php
namespace App\Models\Detail\TabgCb;

use App\Enum\Status;

class TabgCbTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'No_sk_TABG' => $model->No_sk_TABG,
'Tgl_sk_TABG' => $model->Tgl_sk_TABG,
'Nama_Pejabat' => $model->Nama_Pejabat,
'Jabatan' => $model->Jabatan,
'Nama_TABG' => $model->Nama_TABG,
'No_KTP_TABG' => $model->No_KTP_TABG,
'Alamat_lengkap_TABG' => $model->Alamat_lengkap_TABG,
'Pendidikan_terakhir_TABG' => $model->Pendidikan_terakhir_TABG,
'Jurusan_Pendidikan_terakhir' => $model->Jurusan_Pendidikan_terakhir,
'Asal_Universitas' => $model->Asal_Universitas,
'Bidang_Keahlian' => $model->Bidang_Keahlian,
'Jabatan_dalam_tim' => $model->Jabatan_dalam_tim,
'Keterangan' => $model->Keterangan,
'file_SK_TABG' => $model->file_SK_TABG,

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
                'No_sk_TABG' => $model->No_sk_TABG,
'Tgl_sk_TABG' => $model->Tgl_sk_TABG,
'Nama_Pejabat' => $model->Nama_Pejabat,
'Jabatan' => $model->Jabatan,
'Nama_TABG' => $model->Nama_TABG,
'No_KTP_TABG' => $model->No_KTP_TABG,
'Alamat_lengkap_TABG' => $model->Alamat_lengkap_TABG,
'Pendidikan_terakhir_TABG' => $model->Pendidikan_terakhir_TABG,
'Jurusan_Pendidikan_terakhir' => $model->Jurusan_Pendidikan_terakhir,
'Asal_Universitas' => $model->Asal_Universitas,
'Bidang_Keahlian' => $model->Bidang_Keahlian,
'Jabatan_dalam_tim' => $model->Jabatan_dalam_tim,
'Keterangan' => $model->Keterangan,
'file_SK_TABG' => $model->file_SK_TABG,

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
