<?php
namespace App\Models\Detail\PengelolaTeknisBersertifikasi;

use App\Enum\Status;

class PengelolaTeknisBersertifikasiTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'no_sertifikat_pengelola_teknis' => $model->no_sertifikat_pengelola_teknis,
			'tgl_sertifikat_pengelola_teknis' => $model->tgl_sertifikat_pengelola_teknis,
			'nama_pejabat' => $model->nama_pejabat,
			'jabatan' => $model->jabatan,
			'nama_pengelola_teknis' => $model->nama_pengelola_teknis,
			'no_ktp_pengelola_teknis' => $model->no_ktp_pengelola_teknis,
			'dinas_instansi_asal_unit_org' => $model->dinas_instansi_asal_unit_org,
			'alamat_pengelola_teknis' => $model->alamat_pengelola_teknis,
			'pendidikan_terakhir_pengelola_teknis' => $model->pendidikan_terakhir_pengelola_teknis,
			'jurusan_pendidikan_terakhir' => $model->jurusan_pendidikan_terakhir,
			'asal_universitas' => $model->asal_universitas,
			'file_sertifikat_pengelola_teknis' => $model->file_sertifikat_pengelola_teknis,
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
                'no_sertifikat_pengelola_teknis' => $model->no_sertifikat_pengelola_teknis,
			'tgl_sertifikat_pengelola_teknis' => $model->tgl_sertifikat_pengelola_teknis,
			'nama_pejabat' => $model->nama_pejabat,
			'jabatan' => $model->jabatan,
			'nama_pengelola_teknis' => $model->nama_pengelola_teknis,
			'no_ktp_pengelola_teknis' => $model->no_ktp_pengelola_teknis,
			'dinas_instansi_asal_unit_org' => $model->dinas_instansi_asal_unit_org,
			'alamat_pengelola_teknis' => $model->alamat_pengelola_teknis,
			'pendidikan_terakhir_pengelola_teknis' => $model->pendidikan_terakhir_pengelola_teknis,
			'jurusan_pendidikan_terakhir' => $model->jurusan_pendidikan_terakhir,
			'asal_universitas' => $model->asal_universitas,
			'file_sertifikat_pengelola_teknis' => $model->file_sertifikat_pengelola_teknis,
			
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
