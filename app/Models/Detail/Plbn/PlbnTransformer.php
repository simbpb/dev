<?php
namespace App\Models\Detail\Plbn;

use App\Enum\Status;

class PlbnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_kegiatan' => $model->nama_kegiatan,
            'biaya_pelaksanaan_kontraktor' => $model->biaya_pelaksanaan_kontraktor,
            'manajemen_konstruksi' => $model->manajemen_konstruksi,
            'rencana_keu' => $model->rencana_keu,
            'rencana_fisik' => $model->rencana_fisik,
            'realisasi_keu' => $model->realisasi_keu,
            'realisasi_fisik' => $model->realisasi_fisik,
            'permasalahan' => $model->permasalahan,
            'tindak_lanjut' => $model->tindak_lanjut,
            'dokumentasi' => $model->dokumentasi,
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
                'nama_kegiatan' => $model->nama_kegiatan,
                'biaya_pelaksanaan_kontraktor' => $model->biaya_pelaksanaan_kontraktor,
                'manajemen_konstruksi' => $model->manajemen_konstruksi
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
