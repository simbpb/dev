<?php
namespace App\Models\IntegrasiRn;

use App\Enum\Status;

class IntegrasiRnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
			'hdno_rn' => $model->hdno_rn,
			'nama_penghuni' => $model->nama_penghuni,
			'alamat_rn' => $model->alamat_rn,
			'kemen_lembaga' => $model->kemen_lembaga,
			'nama_kecamatan' => $model->nama_kecamatan,
			'status_rn' => $model->status_rn,
			'created_date' => $model->created_date,
			'updated_date' => $model->updated_date,
			
            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
    			'hdno_rn' => $model->hdno_rn,
    			'nama_penghuni' => $model->nama_penghuni,
    			'alamat_rn' => $model->alamat_rn,
    			'kemen_lembaga' => $model->kemen_lembaga,
    			'nama_kecamatan' => $model->nama_kecamatan,
    			'status_rn' => $model->status_rn,
    			'created_date' => $model->created_date,
    			'updated_date' => $model->updated_date
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
