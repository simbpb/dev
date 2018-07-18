<?php
namespace App\Models\Program;

use App\Enum\Status;

class ProgramTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'uraian_renstra' => $model->uraian_renstra,
               'nama_sasaran' => $model->nama_sasaran,
               'thn_prog' => $model->thn_prog,
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
