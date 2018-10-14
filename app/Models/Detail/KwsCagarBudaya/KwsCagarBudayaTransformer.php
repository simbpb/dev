<?php
namespace App\Models\Detail\KwsCagarBudaya;

use App\Enum\Status;

class KwsCagarBudayaTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_aset_cagar_budaya' => $model->nama_aset_cagar_budaya,
'klasifikasi_cagar_budaya' => $model->klasifikasi_cagar_budaya,
'nama_instansi_cagar_budaya' => $model->nama_instansi_cagar_budaya,
'lokasi_cagar_budaya' => $model->lokasi_cagar_budaya,
'sk_penetapan' => $model->sk_penetapan,
'file_SK_penetapan_cagar_budaya' => $model->file_SK_penetapan_cagar_budaya,
'tahun_penetapan' => $model->tahun_penetapan,

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
                'nama_aset_cagar_budaya' => $model->nama_aset_cagar_budaya,
'klasifikasi_cagar_budaya' => $model->klasifikasi_cagar_budaya,
'nama_instansi_cagar_budaya' => $model->nama_instansi_cagar_budaya,
'lokasi_cagar_budaya' => $model->lokasi_cagar_budaya,
'sk_penetapan' => $model->sk_penetapan,
'file_SK_penetapan_cagar_budaya' => $model->file_SK_penetapan_cagar_budaya,
'tahun_penetapan' => $model->tahun_penetapan,

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
