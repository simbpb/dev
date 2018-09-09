<?php
namespace App\Models\Detail\Hsbgn;

use App\Enum\Status;

class HsbgnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'thn_penetapan' => $model->thn_penetapan,
'nama_kecamatan' => $model->nama_kecamatan,
'zona' => $model->zona,
'bg_tidak_sederhana' => $model->bg_tidak_sederhana,
'bg_sederhana' => $model->bg_sederhana,
'rn_tipe_a' => $model->rn_tipe_a,
'rn_tipe_b' => $model->rn_tipe_b,
'rn_tipe_c_d_e' => $model->rn_tipe_c_d_e,
'pagar_gedungnegara_dpn' => $model->pagar_gedungnegara_dpn,
'pagar_gedungnegara_samping' => $model->pagar_gedungnegara_samping,
'pagar_gedungnegara_blkg' => $model->pagar_gedungnegara_blkg,
'pagar_rn_dpn' => $model->pagar_rn_dpn,
'pagar_rn_samping' => $model->pagar_rn_samping,
'pagar_rn_blkg' => $model->pagar_rn_blkg,
'harga_satuan' => $model->harga_satuan,
'sk_penetapan' => $model->sk_penetapan,
'file_sk_penetapan' => $model->file_sk_penetapan,
'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,

        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id,
               'lokasi_kode' => $model->lokasi_kode,
               'thn_periode_keg' => $model->thn_periode_keg,
               'nama_propinsi' => $model->nama_propinsi,
               'nama_kabupatenkota' => $model->nama_kabupatenkota,
               'thn_penetapan' => $model->thn_penetapan,
'nama_kecamatan' => $model->nama_kecamatan,
'zona' => $model->zona,
'bg_tidak_sederhana' => $model->bg_tidak_sederhana,
'bg_sederhana' => $model->bg_sederhana,
'rn_tipe_a' => $model->rn_tipe_a,
'rn_tipe_b' => $model->rn_tipe_b,
'rn_tipe_c_d_e' => $model->rn_tipe_c_d_e,
'pagar_gedungnegara_dpn' => $model->pagar_gedungnegara_dpn,
'pagar_gedungnegara_samping' => $model->pagar_gedungnegara_samping,
'pagar_gedungnegara_blkg' => $model->pagar_gedungnegara_blkg,
'pagar_rn_dpn' => $model->pagar_rn_dpn,
'pagar_rn_samping' => $model->pagar_rn_samping,
'pagar_rn_blkg' => $model->pagar_rn_blkg,
'harga_satuan' => $model->harga_satuan,
'sk_penetapan' => $model->sk_penetapan,
'file_sk_penetapan' => $model->file_sk_penetapan,
'indeks_kemahalan_konstruksi' => $model->indeks_kemahalan_konstruksi,

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
