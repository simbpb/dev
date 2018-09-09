<?php
namespace App\Models\Detail\Rtbl;

use App\Enum\Status;

class RtblTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'thn_penetapan' => $model->thn_penetapan,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'no_perbub_perwal' => $model->no_perbub_perwal,
            'tgl_penetapan_perbub_perwal' => \Carbon\Carbon::parse($model->tgl_penetapan_perbub_perwal)->format('d/m/Y'),
            'file_upload_perbub_perwal' => $model->file_upload_perbub_perwal,
            'tahun_rtbl' => $model->tahun_rtbl,
            'usulan_kws_rtbl' => $model->usulan_kws_rtbl,
            'luas_kws' => $model->luas_kws,
            'satuan_luas_kws' => $model->satuan_luas_kws,
            'cakupan_wilayah' => $model->cakupan_wilayah,
            'uraian_karakter_lokasi' => $model->uraian_karakter_lokasi,
            'uraian_usulan_kws' => $model->uraian_usulan_kws,
            'file_upload_rtbl' => $model->file_upload_rtbl,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
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
               'no_perbub_perwal' => $model->no_perbub_perwal,
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
