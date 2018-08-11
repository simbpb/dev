<?php
namespace App\Models\Master\Uraian;

use App\Enum\Status;

class UraianTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'nama_uraian' => $model->nama_uraian,
            'nama_output' => $model->nama_output,
            'nama_suboutput' => $model->nama_suboutput,
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'nama_uraian' => $model->nama_uraian,
                'nama_output' => $model->nama_output,
                'nama_suboutput' => $model->nama_suboutput,
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
