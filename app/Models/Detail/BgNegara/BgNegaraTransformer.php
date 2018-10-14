<?php
namespace App\Models\Detail\BgNegara;

use App\Enum\Status;

class BgNegaraTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_bg_negara' => $model->nama_bg_negara,
'instansi_pemilik_bg_negara' => $model->instansi_pemilik_bg_negara,
'alamat_bg_negara' => $model->alamat_bg_negara,
'luas_bg_negara_m2' => $model->luas_bg_negara_m2,
'titik_koordinat' => $model->titik_koordinat,
'dokumentasi' => $model->dokumentasi,

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
                'nama_bg_negara' => $model->nama_bg_negara,
'instansi_pemilik_bg_negara' => $model->instansi_pemilik_bg_negara,
'alamat_bg_negara' => $model->alamat_bg_negara,
'luas_bg_negara_m2' => $model->luas_bg_negara_m2,
'titik_koordinat' => $model->titik_koordinat,
'dokumentasi' => $model->dokumentasi,

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
