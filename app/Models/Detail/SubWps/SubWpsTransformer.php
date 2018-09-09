<?php
namespace App\Models\Detail\SubWps;

use App\Enum\Status;

class SubWpsTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'wps_id' => $model->wps_id,
            'nama_sub_wps' => $model->nama_sub_wps,
            'file_upload' => $model->file_upload,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'lokasi_kode' => $model->lokasi_kode,
               'thn_periode_keg' => $model->thn_periode_keg,
               'nama_kabupatenkota' => $model->nama_kabupatenkota,
               'nama_sub_wps' => $model->nama_sub_wps,
               'wps_id' => $model->wps_id,
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
