<?php
namespace App\Models\Detail\BgUmum;

use App\Enum\Status;

class BgUmumTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'nama_kecamatan' => $model->nama_kecamatan,
			'nama_kelurahan' => $model->nama_kelurahan,
			'rt' => $model->rt,
			'rw' => $model->rw,
			'no_rumah' => $model->no_rumah,
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
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'updated_at' => $model->updated_at,
            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'nama_kecamatan' => $model->nama_kecamatan,
			'nama_kelurahan' => $model->nama_kelurahan,
			'rt' => $model->rt,
			'rw' => $model->rw,
			'no_rumah' => $model->no_rumah,
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
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			
                'is_actived' => ($model->is_actived > 0) ? 'ACTIVE' : 'INACTIVE'
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
