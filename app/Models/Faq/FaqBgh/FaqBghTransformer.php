<?php
namespace App\Models\Faq\FaqBgh;

use App\Enum\Status;

class FaqBghTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'bgh_id' => $model->bgh_id,
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
			'nama_kepala_dinas' => $model->nama_kepala_dinas,
			'nama_pengelola' => $model->nama_pengelola,
			'nama_penyedia_jasa_perencanaan' => $model->nama_penyedia_jasa_perencanaan,
			'thn_penerbitan_sertifikat_bgh' => $model->thn_penerbitan_sertifikat_bgh,
			'no_sertifikat_bgh' => $model->no_sertifikat_bgh,
			'file_upload_sertifikat_bgh' => $model->file_upload_sertifikat_bgh,
			'no_plakat_bgh' => $model->no_plakat_bgh,
			'thn_penerbitan_sertifikat_pemanfaatan_bgh' => $model->thn_penerbitan_sertifikat_pemanfaatan_bgh,
			'file_upload_sertifikat_pemanfaatan_bgh' => $model->file_upload_sertifikat_pemanfaatan_bgh,
			'peringkat_bgh' => $model->peringkat_bgh,
			'pemanfaatan_ke' => $model->pemanfaatan_ke,
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
