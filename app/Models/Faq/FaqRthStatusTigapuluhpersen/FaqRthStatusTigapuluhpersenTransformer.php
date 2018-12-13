<?php
namespace App\Models\Faq\FaqRthStatusTigapuluhpersen;

use App\Enum\Status;

class FaqRthStatusTigapuluhpersenTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'status_tigapuluhpersen_id' => $model->status_tigapuluhpersen_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
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
			'tgl_input_wilayah' => $model->tgl_input_wilayah,
			'info_wilayah_sk' => $model->info_wilayah_sk,
			'last_update' => $model->last_update,
			
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
