<?php
namespace App\Models\IntegrasiFactHsbgn;

use App\Enum\Status;

class IntegrasiFactHsbgnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'id_tbl_hsbgn' => $model->id_tbl_hsbgn,
			'id_info_wilayah' => $model->id_info_wilayah,
			'lokasi_kode' => $model->lokasi_kode,
			'kd_struktur' => $model->kd_struktur,
			'uraian' => $model->uraian,
			'tahun_penetapan' => $model->tahun_penetapan,
			'nama_kecamatan' => $model->nama_kecamatan,
			'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
			'luas_wilayah' => $model->luas_wilayah,
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
			'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,
			'tgl_input_hsbgn' => $model->tgl_input_hsbgn,
			'info_wilayah_sk' => $model->info_wilayah_sk,
			'last_update' => $model->last_update
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'id_tbl_hsbgn' => $model->id_tbl_hsbgn,
				'id_info_wilayah' => $model->id_info_wilayah,
				'lokasi_kode' => $model->lokasi_kode,
				'kd_struktur' => $model->kd_struktur,
				'uraian' => $model->uraian,
				'tahun_penetapan' => $model->tahun_penetapan,
				'nama_kecamatan' => $model->nama_kecamatan,
				'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
				'luas_wilayah' => $model->luas_wilayah,
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
				'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,
				'tgl_input_hsbgn' => $model->tgl_input_hsbgn,
				'info_wilayah_sk' => $model->info_wilayah_sk,
				'last_update' => $model->last_update,
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
