<?php
namespace App\Models\IntegrasiRnRekapKemen;

use App\Enum\Status;

class IntegrasiRnRekapKemenTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'id_rekap_kemen' => $model->id_rekap_kemen,
			'kemen_lembaga' => $model->kemen_lembaga,
			'kemen_sewa' => $model->kemen_sewa,
			'kemen_sewa_beli' => $model->kemen_sewa_beli,
			'kemen_lunas' => $model->kemen_lunas,
			'kemen_hak_milik' => $model->kemen_hak_milik,
			'total' => $model->total,
			'created_date' => $model->created_date,
			'updated_date' => $model->updated_date
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'id_rekap_kemen' => $model->id_rekap_kemen,
    			'kemen_lembaga' => $model->kemen_lembaga,
    			'kemen_sewa' => $model->kemen_sewa,
    			'kemen_sewa_beli' => $model->kemen_sewa_beli,
    			'kemen_lunas' => $model->kemen_lunas,
    			'kemen_hak_milik' => $model->kemen_hak_milik,
    			'total' => $model->total,
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
