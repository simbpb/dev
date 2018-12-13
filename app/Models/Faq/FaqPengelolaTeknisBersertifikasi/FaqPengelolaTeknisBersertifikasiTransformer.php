<?php
namespace App\Models\Faq\FaqPengelolaTeknisBersertifikasi;

use App\Enum\Status;

class FaqPengelolaTeknisBersertifikasiTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'pengelola_teknis_bersertifikasi_id' => $model->pengelola_teknis_bersertifikasi_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'kd_struktur' => $model->kd_struktur,
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
