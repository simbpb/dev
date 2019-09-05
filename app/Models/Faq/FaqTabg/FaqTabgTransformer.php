<?php
namespace App\Models\Faq\FaqTabg;

use App\Enum\Status;

class FaqTabgTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'tabg_id' => $model->tabg_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
			'no_sk_tabg' => $model->no_sk_tabg,
			'tgl_sk_tabg' => $model->tgl_sk_tabg,
			'nama_pejabat' => $model->nama_pejabat,
			'jabatan' => $model->jabatan,
			'nama_tabg' => $model->nama_tabg,
			'no_ktp_tabg' => $model->no_ktp_tabg,
			'alamat_tabg' => $model->alamat_tabg,
			'pendidikan_terakhir_tabg' => $model->pendidikan_terakhir_tabg,
			'jurusan_pendidikan_terakhir' => $model->jurusan_pendidikan_terakhir,
			'asal_universitas' => $model->asal_universitas,
			'bidang_keahlian' => $model->bidang_keahlian,
			'jabatan_dalam_tim' => $model->jabatan_dalam_tim,
			'keterangan' => $model->keterangan,
			'file_sk_tabg' => $model->file_sk_tabg,
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
