<?php
namespace App\Models\Detail\Tabg;

use App\Enum\Status;

class TabgTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
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
