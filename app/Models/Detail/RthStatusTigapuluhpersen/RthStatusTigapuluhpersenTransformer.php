<?php
namespace App\Models\Detail\RthStatusTigapuluhpersen;

use App\Enum\Status;

class RthStatusTigapuluhpersenTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'luas_wilayah' => $model->luas_wilayah,
			'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
			'jenis_rth' => $model->jenis_rth,
			'bentuk_rth' => $model->bentuk_rth,
			'nama_kawasan' => $model->nama_kawasan,
			'lokasi_kawasan' => $model->lokasi_kawasan,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'luas_kawasan' => $model->luas_kawasan,
			'satuan_luas_kawasan' => $model->satuan_luas_kawasan,
			'status_aset' => $model->status_aset,
			'updated_at' => $model->updated_at,
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
                'luas_wilayah' => $model->luas_wilayah,
			'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
			'jenis_rth' => $model->jenis_rth,
			'bentuk_rth' => $model->bentuk_rth,
			'nama_kawasan' => $model->nama_kawasan,
			'lokasi_kawasan' => $model->lokasi_kawasan,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'luas_kawasan' => $model->luas_kawasan,
			'satuan_luas_kawasan' => $model->satuan_luas_kawasan,
			'status_aset' => $model->status_aset,
			
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
