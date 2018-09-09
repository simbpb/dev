<?php
namespace App\Models\Detail\Bantek;

use App\Enum\Status;

class BantekTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'lokasi_kode' => $model->lokasi_kode,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_bgn_yg_difasilitasi' => $model->nama_bgn_yg_difasilitasi,
            'nama_penyelenggara' => $model->nama_penyelenggara,
            'waktu_penyelenggara' => $model->waktu_penyelenggara,
            'uraian_sasaran' => $model->uraian_sasaran,
            'materi_kepmen_no332thn2002_disampaikan' => $model->materi_kepmen_no332thn2002_disampaikan,
            'materi_juknis_pt_disampaikan' => $model->materi_juknis_pt_disampaikan,
            'materi_keppres_no80thn2003_disampaikan' => $model->materi_keppres_no80thn2003_disampaikan,
            'materi_hsbgn_disampaikan' => $model->materi_hsbgn_disampaikan,
            'materi_kepmen_no29thn2006_disampaikan' => $model->materi_kepmen_no29thn2006_disampaikan,
            'file_upload_materi_bimtek' => $model->file_upload_materi_bimtek,
            'foto_keg_bimtek' => $model->foto_keg_bimtek,
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
               'uraian_sasaran' => $model->uraian_sasaran,
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
