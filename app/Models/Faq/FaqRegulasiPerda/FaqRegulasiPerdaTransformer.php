<?php
namespace App\Models\Faq\FaqRegulasiPerda;

use App\Enum\Status;

class FaqRegulasiPerdaTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'regulasi_perda_id' => $model->regulasi_perda_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'perda_bg' => $model->perda_bg,
			'file_perda_bg' => $model->file_perda_bg,
			'perda_rt_rw' => $model->perda_rt_rw,
			'file_rt_rw' => $model->file_rt_rw,
			'perda_rd_tr' => $model->perda_rd_tr,
			'file_rd_tr' => $model->file_rd_tr,
			'perda_cagar_budaya' => $model->perda_cagar_budaya,
			'file_perda_cagar_budaya' => $model->file_perda_cagar_budaya,
			'perda_rth' => $model->perda_rth,
			'file_perda_rth' => $model->file_perda_rth,
			'perwal_perbup_bgh' => $model->perwal_perbup_bgh,
			'file_perbup_bgh' => $model->file_perbup_bgh,
			'perwal_perbup_imb' => $model->perwal_perbup_imb,
			'file_perbup_imb' => $model->file_perbup_imb,
			'perwal_perbup_slf' => $model->perwal_perbup_slf,
			'file_perbup_slf' => $model->file_perbup_slf,
			'perwal_perbup_rtbl_1' => $model->perwal_perbup_rtbl_1,
			'file_perbup_rtbl_1' => $model->file_perbup_rtbl_1,
			'perwal_perbup_rtbl_2' => $model->perwal_perbup_rtbl_2,
			'file_perbup_rtbl_2' => $model->file_perbup_rtbl_2,
			'perwal_perbup_rtbl_3' => $model->perwal_perbup_rtbl_3,
			'file_perbup_rtbl_3' => $model->file_perbup_rtbl_3,
			'perwal_perbup_rtbl_4' => $model->perwal_perbup_rtbl_4,
			'file_perbup_rtbl_4' => $model->file_perbup_rtbl_4,
			'perwal_perbup_rtbl_5' => $model->perwal_perbup_rtbl_5,
			'file_perbup_rtbl_5' => $model->file_perbup_rtbl_5,
			'perwal_perbup_rtbl_6' => $model->perwal_perbup_rtbl_6,
			'file_perbup_rtbl_6' => $model->file_perbup_rtbl_6,
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
