<?php
namespace App\Models\Detail\PeraturanNasional;

use App\Enum\Status;

class PeraturanNasionalTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'no_peraturan_nasional' => $model->no_peraturan_nasional,
'uraian' => $model->uraian,
'tentang' => $model->tentang,
'tempat_ditetapkan' => $model->tempat_ditetapkan,
'tgl_ditetapkan' => $model->tgl_ditetapkan,
'bln_ditetapkan' => $model->bln_ditetapkan,
'thn_ditetapkan' => $model->thn_ditetapkan,
'nama_pejabat_yg_menetapkan' => $model->nama_pejabat_yg_menetapkan,
'file_upload' => $model->file_upload,

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
               'no_peraturan_nasional' => $model->no_peraturan_nasional,
'uraian' => $model->uraian,
'tentang' => $model->tentang,
'tempat_ditetapkan' => $model->tempat_ditetapkan,
'tgl_ditetapkan' => $model->tgl_ditetapkan,
'bln_ditetapkan' => $model->bln_ditetapkan,
'thn_ditetapkan' => $model->thn_ditetapkan,
'nama_pejabat_yg_menetapkan' => $model->nama_pejabat_yg_menetapkan,
'file_upload' => $model->file_upload,

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
