<?php
namespace App\Models\Detail\Bgh;

use App\Enum\Status;

class BghTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_kepala_dinas' => $model->nama_kepala_dinas,
'nama_pengelola' => $model->nama_pengelola,
'nama_penyedia_jasa_perencanaan' => $model->nama_penyedia_jasa_perencanaan,
'thn_penerbitan_sertifikat_bgh' => $model->thn_penerbitan_sertifikat_bgh,
'no_sertifikat_bgh' => $model->no_sertifikat_bgh,
'file_upload_sertifikat_bgh' => $model->file_upload_sertifikat_bgh,
'no_plakat_bgh' => $model->no_plakat_bgh,
'thn_penerbitan_sertifikat_pemanfaatan_bgh' => $model->thn_penerbitan_sertifikat_pemanfaatan_bgh,
'file_upload_sertifikat_pemanfaatan_bgh' => $model->file_upload_sertifikat_pemanfaatan_bgh,
'peringkat_bgh' => $model->peringkat_bgh,
'pemanfaatan_ke' => $model->pemanfaatan_ke,

        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'lokasi_kode' => $model->lokasi_kode,
               'thn_periode_keg' => $model->thn_periode_keg,
               'nama_propinsi' => $model->nama_propinsi,
               'nama_kabupatenkota' => $model->nama_kabupatenkota,
               'nama_kepala_dinas' => $model->nama_kepala_dinas,
'nama_pengelola' => $model->nama_pengelola,
'nama_penyedia_jasa_perencanaan' => $model->nama_penyedia_jasa_perencanaan,
'thn_penerbitan_sertifikat_bgh' => $model->thn_penerbitan_sertifikat_bgh,
'no_sertifikat_bgh' => $model->no_sertifikat_bgh,
'file_upload_sertifikat_bgh' => $model->file_upload_sertifikat_bgh,
'no_plakat_bgh' => $model->no_plakat_bgh,
'thn_penerbitan_sertifikat_pemanfaatan_bgh' => $model->thn_penerbitan_sertifikat_pemanfaatan_bgh,
'file_upload_sertifikat_pemanfaatan_bgh' => $model->file_upload_sertifikat_pemanfaatan_bgh,
'peringkat_bgh' => $model->peringkat_bgh,
'pemanfaatan_ke' => $model->pemanfaatan_ke,

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
