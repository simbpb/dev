<?php
namespace App\Models\Faq\FaqAssetCagarBudaya;

use App\Enum\Status;

class FaqAssetCagarBudayaTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'cagar_budaya_id' => $model->cagar_budaya_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'nama_aset_cagar_budaya' => $model->nama_aset_cagar_budaya,
			'klasifikasi_cagar_budaya' => $model->klasifikasi_cagar_budaya,
			'nama_instansi_cagar_budaya' => $model->nama_instansi_cagar_budaya,
			'lokasi_cagar_budaya' => $model->lokasi_cagar_budaya,
			'sk_penetapan' => $model->sk_penetapan,
			'file_sk_penetapan_cagar_budaya' => $model->file_sk_penetapan_cagar_budaya,
			'tahun_penetapan' => $model->tahun_penetapan,
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
