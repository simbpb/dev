<?php
namespace App\Models\Faq\FaqBgUmum;

use App\Enum\Status;

class FaqBgUmumTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'bg_umum_id' => $model->bg_umum_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'nama_kecamatan' => $model->nama_kecamatan,
			'nama_kelurahan' => $model->nama_kelurahan,
			'kd_struktur' => $model->kd_struktur,
			'rt' => $model->rt,
			'rw' => $model->rw,
			'no_rumah' => $model->no_rumah,
			'nama_pemilik_bangunan' => $model->nama_pemilik_bangunan,
			'no_ktp_pemilik_bangunan' => $model->no_ktp_pemilik_bangunan,
			'alamat_bangunan' => $model->alamat_bangunan,
			'fungsi_bangunan' => $model->fungsi_bangunan,
			'memiliki_imb' => $model->memiliki_imb,
			'no_imb' => $model->no_imb,
			'file_imb' => $model->file_imb,
			'memiliki_slf' => $model->memiliki_slf,
			'no_slf' => $model->no_slf,
			'file_slf' => $model->file_slf,
			'tingkat_kompleksitas' => $model->tingkat_kompleksitas,
			'tingkat_permanensi' => $model->tingkat_permanensi,
			'tingkat_risiko_kebakaran' => $model->tingkat_risiko_kebakaran,
			'zona_gempa' => $model->zona_gempa,
			'kategori_lokasi' => $model->kategori_lokasi,
			'kategori_ketinggian' => $model->kategori_ketinggian,
			'kepemilikan' => $model->kepemilikan,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
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
