<?php
namespace App\Models\Master\Detail;

use App\Enum\Status;

class DetailTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'nama_form' => $model->nama_form,
               'path' => $model->path,
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
