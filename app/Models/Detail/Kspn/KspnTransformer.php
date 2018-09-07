<?php
namespace App\Models\Detail\Kspn;

use App\Enum\Status;

class KspnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'thn_penetapan' => $model->thn_penetapan,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'pariwisata_kspn' => $model->pariwisata_kspn,
            'tipe_dok_kspn' => $model->tipe_dok_kspn,
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
               'pariwisata_kspn' => $model->pariwisata_kspn,
               'thn_penetapan' => $model->thn_penetapan
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