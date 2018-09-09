<?php
namespace App\Models\Detail\Tabg;

use App\Enum\Status;

class TabgTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'no_perbub_perwal' => $model->no_perbub_perwal,
            'tgl_penetapan_perbub_perwal' => $model->tgl_penetapan_perbub_perwal,
            'file_upload_perbub_perwal' => $model->file_upload_perbub_perwal,
            'nama_lengkap' => $model->nama_lengkap,
            'keahlian' => $model->keahlian,
            'sk_pengangkatan' => $model->sk_pengangkatan,
            'masa_tugas' => $model->masa_tugas,
            'file_upload_sk_pengangkatan' => $model->file_upload_sk_pengangkatan,
            'fungsi_bg_terdata_dan_imb' => $model->fungsi_bg_terdata_dan_imb,
            'tipe_bg_terdata_dan_imb' => $model->tipe_bg_terdata_dan_imb,
            'nama_pemilik_bg_terdata_imb' => $model->nama_pemilik_bg_terdata_imb,
            'lok_bg_terdata_imb' => $model->lok_bg_terdata_imb,
            'fungsi_bg_terdata_dan_slf' => $model->fungsi_bg_terdata_dan_slf,
            'tipe_bg_terdata_dan_slf' => $model->tipe_bg_terdata_dan_slf,
            'nama_pemilik_bg_terdata_slf' => $model->nama_pemilik_bg_terdata_slf,
            'lok_bg_terdata_slf' => $model->lok_bg_terdata_slf,
            'no_imb_bg_didampingi_tabg' => $model->no_imb_bg_didampingi_tabg,
            'no_slf_bg_didampingi_tabg' => $model->no_slf_bg_didampingi_tabg,

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
               'no_perbub_perwal' => $model->no_perbub_perwal
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
