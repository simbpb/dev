<?php
namespace App\Models\Detail\KwsDpn;

use App\Enum\Status;

class KwsDpnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_dpn' => $model->nama_dpn,
            'uraian_kws_dpn' => $model->uraian_kws_dpn,
            'file_upload' => $model->file_upload,
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
                'nama_dpn' => $model->nama_dpn,
                'uraian_kws_dpn' => $model->uraian_kws_dpn,
                'file_upload' => $model->file_upload,
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
