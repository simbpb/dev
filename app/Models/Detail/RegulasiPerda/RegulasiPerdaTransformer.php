<?php
namespace App\Models\Detail\RegulasiPerda;

use App\Enum\Status;

class RegulasiPerdaTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'perda_bg' => $model->perda_bg,
'file_Perdabg' => $model->file_Perdabg,
'perda_rt_rw' => $model->perda_rt_rw,
'file_RTRW' => $model->file_RTRW,
'perda_rd_tr' => $model->perda_rd_tr,
'file_RDTR' => $model->file_RDTR,
'perda_cagar_budaya' => $model->perda_cagar_budaya,
'file_PerdaCagarBudaya' => $model->file_PerdaCagarBudaya,
'perda_rth' => $model->perda_rth,
'file_PerdaRTH' => $model->file_PerdaRTH,
'perwal_perbup_bgh' => $model->perwal_perbup_bgh,
'file_PerbupBGH' => $model->file_PerbupBGH,
'perwal_perbup_imb' => $model->perwal_perbup_imb,
'file_PerbupIMB' => $model->file_PerbupIMB,
'perwal_perbup_slf' => $model->perwal_perbup_slf,
'file_PerbupSLF' => $model->file_PerbupSLF,
'perwal_perbup_rtbl_1' => $model->perwal_perbup_rtbl_1,
'file_PerbupRTBL_1' => $model->file_PerbupRTBL_1,
'perwal_perbup_rtbl_2' => $model->perwal_perbup_rtbl_2,
'file_PerbupRTBL_2' => $model->file_PerbupRTBL_2,
'perwal_perbup_rtbl_3' => $model->perwal_perbup_rtbl_3,
'file_PerbupRTBL_3' => $model->file_PerbupRTBL_3,
'perwal_perbup_rtbl_4' => $model->perwal_perbup_rtbl_4,
'file_PerbupRTBL_4' => $model->file_PerbupRTBL_4,
'perwal_perbup_rtbl_5' => $model->perwal_perbup_rtbl_5,
'file_PerbupRTBL_5' => $model->file_PerbupRTBL_5,
'perwal_perbup_rtbl_6' => $model->perwal_perbup_rtbl_6,
'file_PerbupRTBL_6' => $model->file_PerbupRTBL_6,

            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'lokasi_kode' => $model->lokasi_kode,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'perda_bg' => $model->perda_bg,
'file_Perdabg' => $model->file_Perdabg,
'perda_rt_rw' => $model->perda_rt_rw,
'file_RTRW' => $model->file_RTRW,
'perda_rd_tr' => $model->perda_rd_tr,
'file_RDTR' => $model->file_RDTR,
'perda_cagar_budaya' => $model->perda_cagar_budaya,
'file_PerdaCagarBudaya' => $model->file_PerdaCagarBudaya,
'perda_rth' => $model->perda_rth,
'file_PerdaRTH' => $model->file_PerdaRTH,
'perwal_perbup_bgh' => $model->perwal_perbup_bgh,
'file_PerbupBGH' => $model->file_PerbupBGH,
'perwal_perbup_imb' => $model->perwal_perbup_imb,
'file_PerbupIMB' => $model->file_PerbupIMB,
'perwal_perbup_slf' => $model->perwal_perbup_slf,
'file_PerbupSLF' => $model->file_PerbupSLF,
'perwal_perbup_rtbl_1' => $model->perwal_perbup_rtbl_1,
'file_PerbupRTBL_1' => $model->file_PerbupRTBL_1,
'perwal_perbup_rtbl_2' => $model->perwal_perbup_rtbl_2,
'file_PerbupRTBL_2' => $model->file_PerbupRTBL_2,
'perwal_perbup_rtbl_3' => $model->perwal_perbup_rtbl_3,
'file_PerbupRTBL_3' => $model->file_PerbupRTBL_3,
'perwal_perbup_rtbl_4' => $model->perwal_perbup_rtbl_4,
'file_PerbupRTBL_4' => $model->file_PerbupRTBL_4,
'perwal_perbup_rtbl_5' => $model->perwal_perbup_rtbl_5,
'file_PerbupRTBL_5' => $model->file_PerbupRTBL_5,
'perwal_perbup_rtbl_6' => $model->perwal_perbup_rtbl_6,
'file_PerbupRTBL_6' => $model->file_PerbupRTBL_6,

                'is_actived' => $model->is_actived
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
