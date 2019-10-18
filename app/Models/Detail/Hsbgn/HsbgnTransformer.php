<?php
namespace App\Models\Detail\Hsbgn;

use App\Enum\Status;

class HsbgnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'tahun_penetapan' => $model->tahun_penetapan,
			'nama_kecamatan' => $model->nama_kecamatan,
			'angka_luas_wilayah' => $model->angka_luas_wilayah,
			'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
			'zona' => $model->zona,
			'bg_tidak_sederhana' => $model->bg_tidak_sederhana,
			'bg_sederhana' => $model->bg_sederhana,
			'rumahnegara_tipe_a' => $model->rumahnegara_tipe_a,
			'rumahnegara_tipe_b' => $model->rumahnegara_tipe_b,
			'rumahnegara_tipe_c_d_e' => $model->rumahnegara_tipe_c_d_e,
			'pagar_gedungnegara_depan' => $model->pagar_gedungnegara_depan,
			'pagar_gedungnegara_samping' => $model->pagar_gedungnegara_samping,
			'pagar_gedungnegara_belakang' => $model->pagar_gedungnegara_belakang,
			'pagar_rumahnegara_depan' => $model->pagar_rumahnegara_depan,
			'pagar_rumahnegara_samping' => $model->pagar_rumahnegara_samping,
			'pagar_rumahnegara_belakang' => $model->pagar_rumahnegara_belakang,
			'sk_penetapan' => $model->sk_penetapan,
			'file_sk_penetapan_hsbgn' => $model->file_sk_penetapan_hsbgn,
			'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,
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
                'tahun_penetapan' => $model->tahun_penetapan,
			'nama_kecamatan' => $model->nama_kecamatan,
			'angka_luas_wilayah' => $model->angka_luas_wilayah,
			'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
			'zona' => $model->zona,
			'bg_tidak_sederhana' => $model->bg_tidak_sederhana,
			'bg_sederhana' => $model->bg_sederhana,
			'rumahnegara_tipe_a' => $model->rumahnegara_tipe_a,
			'rumahnegara_tipe_b' => $model->rumahnegara_tipe_b,
			'rumahnegara_tipe_c_d_e' => $model->rumahnegara_tipe_c_d_e,
			'pagar_gedungnegara_depan' => $model->pagar_gedungnegara_depan,
			'pagar_gedungnegara_samping' => $model->pagar_gedungnegara_samping,
			'pagar_gedungnegara_belakang' => $model->pagar_gedungnegara_belakang,
			'pagar_rumahnegara_depan' => $model->pagar_rumahnegara_depan,
			'pagar_rumahnegara_samping' => $model->pagar_rumahnegara_samping,
			'pagar_rumahnegara_belakang' => $model->pagar_rumahnegara_belakang,
			'sk_penetapan' => $model->sk_penetapan,
			'file_sk_penetapan_hsbgn' => $model->file_sk_penetapan_hsbgn,
			'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,
			
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
