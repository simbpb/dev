<?php
namespace App\Models\InfoWilayah;

use App\Enum\Status;

class InfoWilayahTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'sk' => $model->sk,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
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
