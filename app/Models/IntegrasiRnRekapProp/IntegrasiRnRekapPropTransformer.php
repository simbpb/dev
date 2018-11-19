<?php
namespace App\Models\IntegrasiRnRekapProp;

use App\Enum\Status;

class IntegrasiRnRekapPropTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'id_rekap_prop' => $model->id_rekap_prop,
			'lokasi_kode' => $model->lokasi_kode,
			'prop_sewa' => $model->prop_sewa,
			'prop_sewa_beli' => $model->prop_sewa_beli,
			'prop_lunas' => $model->prop_lunas,
			'prop_hak_milik' => $model->prop_hak_milik,
			'total' => $model->total,
			'created_date' => $model->created_date,
			'updated_date' => $model->updated_date,
			
            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'id_rekap_prop' => $model->id_rekap_prop,
			'lokasi_kode' => $model->lokasi_kode,
			'prop_sewa' => $model->prop_sewa,
			'prop_sewa_beli' => $model->prop_sewa_beli,
			'prop_lunas' => $model->prop_lunas,
			'prop_hak_milik' => $model->prop_hak_milik,
			'total' => $model->total,
			'created_date' => $model->created_date,
			'updated_date' => $model->updated_date,
			
                'is_actived' => ($model->is_actived > 0) ? 'ACTIVE' : 'INACTIVE'
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
