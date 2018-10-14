<?php
namespace App\Models\Detail\PelepasanRng3;

use App\Enum\Status;

class PelepasanRng3Transformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'hdno_rn' => $model->hdno_rn,
'nama_kecamatan' => $model->nama_kecamatan,
'kemen_lembaga' => $model->kemen_lembaga,
'nama_penghuni' => $model->nama_penghuni,
'alamat_rn' => $model->alamat_rn,
'no_sk_gol3' => $model->no_sk_gol3,
'file_upload_sk_gol3' => $model->file_upload_sk_gol3,
'no_sip_gol3' => $model->no_sip_gol3,
'file_upload_sip_gol3' => $model->file_upload_sip_gol3,
'no_sk_menteri_pupr' => $model->no_sk_menteri_pupr,
'file_upload_sk_menteri_pupr' => $model->file_upload_sk_menteri_pupr,
'thn_perjanjian_sewabeli' => $model->thn_perjanjian_sewabeli,
'status_rn' => $model->status_rn,
'thn_pelepasan_rng3' => $model->thn_pelepasan_rng3,
'sk_hak_milik' => $model->sk_hak_milik,
'file_upload_sk_hak_milik' => $model->file_upload_sk_hak_milik,

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
                'hdno_rn' => $model->hdno_rn,
'nama_kecamatan' => $model->nama_kecamatan,
'kemen_lembaga' => $model->kemen_lembaga,
'nama_penghuni' => $model->nama_penghuni,
'alamat_rn' => $model->alamat_rn,
'no_sk_gol3' => $model->no_sk_gol3,
'file_upload_sk_gol3' => $model->file_upload_sk_gol3,
'no_sip_gol3' => $model->no_sip_gol3,
'file_upload_sip_gol3' => $model->file_upload_sip_gol3,
'no_sk_menteri_pupr' => $model->no_sk_menteri_pupr,
'file_upload_sk_menteri_pupr' => $model->file_upload_sk_menteri_pupr,
'thn_perjanjian_sewabeli' => $model->thn_perjanjian_sewabeli,
'status_rn' => $model->status_rn,
'thn_pelepasan_rng3' => $model->thn_pelepasan_rng3,
'sk_hak_milik' => $model->sk_hak_milik,
'file_upload_sk_hak_milik' => $model->file_upload_sk_hak_milik,

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
