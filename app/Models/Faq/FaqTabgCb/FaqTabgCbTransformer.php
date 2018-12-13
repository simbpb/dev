<?php
namespace App\Models\Faq\FaqTabgCb;

use App\Enum\Status;

class FaqTabgCbTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'tabg_cb_id' => $model->tabg_cb_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'no_sk_tabg_cb' => $model->no_sk_tabg_cb,
			'tgl_sk_tabg_cb' => $model->tgl_sk_tabg_cb,
			'nama_pejabat' => $model->nama_pejabat,
			'jabatan' => $model->jabatan,
			'nama_tabg_cb' => $model->nama_tabg_cb,
			'no_ktp_tabg_cb' => $model->no_ktp_tabg_cb,
			'alamat_tabg_cb' => $model->alamat_tabg_cb,
			'pendidikan_terakhir_tabg_cb' => $model->pendidikan_terakhir_tabg_cb,
			'jurusan_pendidikan_terakhir' => $model->jurusan_pendidikan_terakhir,
			'asal_universitas' => $model->asal_universitas,
			'bidang_keahlian' => $model->bidang_keahlian,
			'jabatan_dalam_tim' => $model->jabatan_dalam_tim,
			'keterangan' => $model->keterangan,
			'file_sk_tabg_cb' => $model->file_sk_tabg_cb,
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
