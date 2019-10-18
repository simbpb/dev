<?php
namespace App\Models\Detail\BgNegara;

use App\Enum\Status;

class BgNegaraTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'nama_bg_negara' => $model->nama_bg_negara,
			'instansi_pemilik_bg_negara' => $model->instansi_pemilik_bg_negara,
			'alamat_bg_negara' => $model->alamat_bg_negara,
			'luas_bg_negara_m2' => $model->luas_bg_negara_m2,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'dokumentasi' => $model->dokumentasi,
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
                'nama_bg_negara' => $model->nama_bg_negara,
			'instansi_pemilik_bg_negara' => $model->instansi_pemilik_bg_negara,
			'alamat_bg_negara' => $model->alamat_bg_negara,
			'luas_bg_negara_m2' => $model->luas_bg_negara_m2,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'dokumentasi' => $model->dokumentasi,
			
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
