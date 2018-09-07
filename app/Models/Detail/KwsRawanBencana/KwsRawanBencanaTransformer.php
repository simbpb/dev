<?php
namespace App\Models\Detail\KwsRawanBencana;

use App\Enum\Status;

class KwsRawanBencanaTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'thn_penetapan' => $model->thn_penetapan,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'indeks_resiko' => $model->indeks_resiko,
            'indeks_resiko' => $model->indeks_resiko,
            'tingkat_resiko' => $model->tingkat_resiko,
            'struktur_ruang' => $model->struktur_ruang,
            'propinsi_id' => $model->lokasi->lokasi_propinsi,
            'kota_id' => $model->lokasi->lokasi_kabupatenkota,
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
                'indeks_resiko' => $model->indeks_resiko,
                'tingkat_resiko' => $model->tingkat_resiko,
                'struktur_ruang' => $model->struktur_ruang,
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
