<?php
namespace App\Models\Faq\FaqRthRencanaTigapuluhpersen;

use App\Enum\Status;

class FaqRthRencanaTigapuluhpersenTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'rth_rencana_tigapuluhpersen_id' => $model->rth_rencana_tigapuluhpersen_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'dok_rencana_kota_hijau_rakh' => $model->dok_rencana_kota_hijau_rakh,
			'file_dok_rencana_kota_hijau_rakh' => $model->file_dok_rencana_kota_hijau_rakh,
			'nama_dokumen_perencanaan' => $model->nama_dokumen_perencanaan,
			'dok_disusun_tahun' => $model->dok_disusun_tahun,
			'dok_disahkan_oleh' => $model->dok_disahkan_oleh,
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
