<?php
namespace App\Models\Master\Sasaran;

use App\Enum\Status;

class SasaranTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'master' => $model->master,
               'master_id' => $model->master_id,
               'nama_sasaran' => $model->nama_sasaran,
               'nama_suboutput' => $model->nama_suboutput,
               'nama_output' => $model->nama_output,
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
