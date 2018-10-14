<?php
namespace App\Models\Detail\RehabBgPusakaIstana;

use App\Enum\Status;

class RehabBgPusakaIstanaTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'nama_kegiatan' => $model->nama_kegiatan,
'thn_anggaran' => $model->thn_anggaran,
'sumber_anggaran' => $model->sumber_anggaran,
'alokasi_anggaran' => $model->alokasi_anggaran,
'volume_pekerjaan' => $model->volume_pekerjaan,
'instansi_unit_organisasi_pelaksana' => $model->instansi_unit_organisasi_pelaksana,
'lokasi_kegiatan_proyek' => $model->lokasi_kegiatan_proyek,
'titik_koordinat' => $model->titik_koordinat,
'status_aset' => $model->status_aset,
'biaya_pelaksanaan_kontraktor' => $model->biaya_pelaksanaan_kontraktor,
'manajemen_konstruksi' => $model->manajemen_konstruksi,
'rencana_keu' => $model->rencana_keu,
'rencana_fisik' => $model->rencana_fisik,
'dokumentasi' => $model->dokumentasi,

            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'lokasi_kode' => $model->lokasi_kode,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'nama_kegiatan' => $model->nama_kegiatan,
'thn_anggaran' => $model->thn_anggaran,
'sumber_anggaran' => $model->sumber_anggaran,
'alokasi_anggaran' => $model->alokasi_anggaran,
'volume_pekerjaan' => $model->volume_pekerjaan,
'instansi_unit_organisasi_pelaksana' => $model->instansi_unit_organisasi_pelaksana,
'lokasi_kegiatan_proyek' => $model->lokasi_kegiatan_proyek,
'titik_koordinat' => $model->titik_koordinat,
'status_aset' => $model->status_aset,
'biaya_pelaksanaan_kontraktor' => $model->biaya_pelaksanaan_kontraktor,
'manajemen_konstruksi' => $model->manajemen_konstruksi,
'rencana_keu' => $model->rencana_keu,
'rencana_fisik' => $model->rencana_fisik,
'dokumentasi' => $model->dokumentasi,

                'is_actived' => $model->is_actived
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
