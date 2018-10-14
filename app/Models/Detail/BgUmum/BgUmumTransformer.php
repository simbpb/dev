<?php
namespace App\Models\Detail\BgUmum;

use App\Enum\Status;

class BgUmumTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_pemilik_bangunan' => $model->nama_pemilik_bangunan,
'no_ktp_pemilik_bangunan' => $model->no_ktp_pemilik_bangunan,
'alamat_bangunan' => $model->alamat_bangunan,
'fungsi_bangunan' => $model->fungsi_bangunan,
'memiliki_imb' => $model->memiliki_imb,
'no_imb' => $model->no_imb,
'file_imb' => $model->file_imb,
'memiliki_slf' => $model->memiliki_slf,
'no_slf' => $model->no_slf,
'file_slf' => $model->file_slf,
'tingkat_kompleksitas' => $model->tingkat_kompleksitas,
'tingkat_permanensi' => $model->tingkat_permanensi,
'tingkat_risiko_kebakaran' => $model->tingkat_risiko_kebakaran,
'zona_gempa' => $model->zona_gempa,
'kategori_lokasi' => $model->kategori_lokasi,
'kategori_ketinggian' => $model->kategori_ketinggian,
'kepemilikan' => $model->kepemilikan,

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
               'nama_pemilik_bangunan' => $model->nama_pemilik_bangunan,
'no_ktp_pemilik_bangunan' => $model->no_ktp_pemilik_bangunan,
'alamat_bangunan' => $model->alamat_bangunan,
'fungsi_bangunan' => $model->fungsi_bangunan,
'memiliki_imb' => $model->memiliki_imb,
'no_imb' => $model->no_imb,
'file_imb' => $model->file_imb,
'memiliki_slf' => $model->memiliki_slf,
'no_slf' => $model->no_slf,
'file_slf' => $model->file_slf,
'tingkat_kompleksitas' => $model->tingkat_kompleksitas,
'tingkat_permanensi' => $model->tingkat_permanensi,
'tingkat_risiko_kebakaran' => $model->tingkat_risiko_kebakaran,
'zona_gempa' => $model->zona_gempa,
'kategori_lokasi' => $model->kategori_lokasi,
'kategori_ketinggian' => $model->kategori_ketinggian,
'kepemilikan' => $model->kepemilikan,

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
