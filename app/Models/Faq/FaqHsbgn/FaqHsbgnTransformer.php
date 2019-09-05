<?php
namespace App\Models\Faq\FaqHsbgn;

use App\Enum\Status;

class FaqHsbgnTransformer{

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'hsbgn_id' => $model->hsbgn_id,
			'info_wilayah_id' => $model->info_wilayah_id,
			'detail_kdprog_id' => $model->detail_kdprog_id,
			'thn_periode_keg' => $model->thn_periode_keg,
			'lokasi_kode' => $model->lokasi_kode,
			'tahun_penetapan' => $model->tahun_penetapan,
			'nama_propinsi' => $model->nama_propinsi,
			'nama_kabupatenkota' => $model->nama_kabupatenkota,
			'nama_kecamatan' => $model->nama_kecamatan,
			'kd_struktur' => $model->kd_struktur,
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
