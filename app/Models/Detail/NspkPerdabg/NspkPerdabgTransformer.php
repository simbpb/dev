<?php
namespace App\Models\Detail\NspkPerdabg;

use App\Enum\Status;

class NspkPerdabgTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'status_perdabg' => $model->status_perdabg,
            'no_perdabg' => $model->no_perdabg,
            'tempat_penetapan' => $model->tempat_penetapan,
            'tgl_penetapan' => $model->tgl_penetapan,
            'bln_penetapan' => $model->bln_penetapan,
            'thn_perdabg' => $model->thn_perdabg,
            'tgl_input_perdabg' => \Carbon\Carbon::parse($model->tgl_input_perdabg)->format('d/m/Y'),
            'nama_pejabat_yg_menetapkan' => $model->nama_pejabat_yg_menetapkan,
            'keterangan' => $model->keterangan,
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
               'no_perdabg' => $model->no_perdabg,
               'nama_pejabat_yg_menetapkan' => $model->nama_pejabat_yg_menetapkan
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
