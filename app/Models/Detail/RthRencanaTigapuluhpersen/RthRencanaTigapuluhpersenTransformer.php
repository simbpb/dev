<?php
namespace App\Models\Detail\RthRencanaTigapuluhpersen;

use App\Enum\Status;

class RthRencanaTigapuluhpersenTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'dok_rencana_kota_hijau_rakh' => $model->dok_rencana_kota_hijau_rakh,
			'file_dok_rencana_kota_hijau_rakh' => $model->file_dok_rencana_kota_hijau_rakh,
			'nama_dokumen_perencanaan' => $model->nama_dokumen_perencanaan,
			'dok_disusun_tahun' => $model->dok_disusun_tahun,
			'dok_disahkan_oleh' => $model->dok_disahkan_oleh,
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
                'dok_rencana_kota_hijau_rakh' => $model->dok_rencana_kota_hijau_rakh,
			'file_dok_rencana_kota_hijau_rakh' => $model->file_dok_rencana_kota_hijau_rakh,
			'nama_dokumen_perencanaan' => $model->nama_dokumen_perencanaan,
			'dok_disusun_tahun' => $model->dok_disusun_tahun,
			'dok_disahkan_oleh' => $model->dok_disahkan_oleh,
			
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
