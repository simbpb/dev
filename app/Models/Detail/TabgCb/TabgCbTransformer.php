<?php
namespace App\Models\Detail\TabgCb;

use App\Enum\Status;

class TabgCbTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
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
