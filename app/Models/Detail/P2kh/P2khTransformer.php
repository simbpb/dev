<?php
namespace App\Models\Detail\P2kh;

use App\Enum\Status;

class P2khTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'thn_penetapan' => $model->thn_penetapan,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'thn_penetapan' => $model->thn_penetapan,
            'nama_lokasi' => $model->nama_lokasi,
            'luas_kws' => $model->luas_kws,
            'satuan_luas_kws' => $model->satuan_luas_kws,
            'cakupan_wilayah' => $model->cakupan_wilayah,
            'uraian_karakter_lokasi' => $model->uraian_karakter_lokasi,
            'tipe_dok_p2kh' => $model->tipe_dok_p2kh,
            'file_upload' => $model->file_upload,
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
               'nama_lokasi' => $model->nama_lokasi,
               'thn_penetapan' => $model->thn_penetapan,
               'luas_kws' => $model->luas_kws,
               'satuan_luas_kws' => $model->satuan_luas_kws,
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
