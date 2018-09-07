<?php
namespace App\Models\Detail\PelepasanRng3;

use App\Enum\Status;

class PelepasanRng3Transformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'thn_penetapan' => $model->thn_penetapan,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'nama_kecamatan' => $model->nama_kecamatan,
            'hdno_rn' => $model->hdno_rn,
            'nama_penghuni' => $model->nama_penghuni,
            'kemen_lembaga' => $model->kemen_lembaga,
            'alamat_rn' => $model->alamat_rn,
            'no_sk_gol3' => $model->no_sk_gol3,
            'file_upload_sk_gol3' => $model->file_upload_sk_gol3,
            'file_upload_sip_gol3' => $model->file_upload_sip_gol3,
            'file_upload_sk_menteri_pupr' => $model->file_upload_sk_menteri_pupr,
            'no_sip_gol3' => $model->no_sip_gol3,
            'no_sk_menteri_pupr' => $model->no_sk_menteri_pupr,
            'thn_perjanjian_sewabeli' => $model->thn_perjanjian_sewabeli,
            'status_rn' => $model->status_rn,
            'thn_pelepasan_rng3' => $model->thn_pelepasan_rng3,
            'sk_hak_milik' => $model->sk_hak_milik,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'kecamatan_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kecamatan : null,
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
               'hdno_rn' => $model->hdno_rn,
               'nama_penghuni' => $model->nama_penghuni,
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
