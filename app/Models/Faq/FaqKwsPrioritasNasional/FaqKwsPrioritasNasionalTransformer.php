<?php
namespace App\Models\Faq\FaqKwsPrioritasNasional;

use App\Enum\Status;

class FaqKwsPrioritasNasionalTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'kws_prioritas_nasional_id' => $model->kws_prioritas_nasional_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'nama_kegiatan' => $model->nama_kegiatan,
			'thn_anggaran' => $model->thn_anggaran,
			'sumber_anggaran' => $model->sumber_anggaran,
			'alokasi_anggaran' => $model->alokasi_anggaran,
			'volume_pekerjaan' => $model->volume_pekerjaan,
			'instansi_unit_organisasi_pelaksana' => $model->instansi_unit_organisasi_pelaksana,
			'lokasi_kegiatan_proyek' => $model->lokasi_kegiatan_proyek,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
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
