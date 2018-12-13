<?php
namespace App\Models\Detail\Plbn;

use App\Enum\Status;

class PlbnTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'nama_kegiatan' => $model->nama_kegiatan,
			'thn_anggaran' => $model->thn_anggaran,
			'sumber_anggaran' => $model->sumber_anggaran,
			'alokasi_anggaran' => $model->alokasi_anggaran,
			'volume_pekerjaan' => $model->volume_pekerjaan,
			'instansi_unit_organisasi_pelaksana' => $model->instansi_unit_organisasi_pelaksana,
			'lokasi_kegiatan_proyek' => $model->lokasi_kegiatan_proyek,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
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
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'nama_kegiatan' => $model->nama_kegiatan,
			'thn_anggaran' => $model->thn_anggaran,
			'sumber_anggaran' => $model->sumber_anggaran,
			'alokasi_anggaran' => $model->alokasi_anggaran,
			'volume_pekerjaan' => $model->volume_pekerjaan,
			'instansi_unit_organisasi_pelaksana' => $model->instansi_unit_organisasi_pelaksana,
			'lokasi_kegiatan_proyek' => $model->lokasi_kegiatan_proyek,
			'titik_koordinat_lat' => $model->titik_koordinat_lat,
			'titik_koordinat_long' => $model->titik_koordinat_long,
			'status_aset' => $model->status_aset,
			'biaya_pelaksanaan_kontraktor' => $model->biaya_pelaksanaan_kontraktor,
			'manajemen_konstruksi' => $model->manajemen_konstruksi,
			'rencana_keu' => $model->rencana_keu,
			'rencana_fisik' => $model->rencana_fisik,
			'dokumentasi' => $model->dokumentasi,
			
                'is_actived' => ($model->is_actived > 0) ? 'ACTIVE' : 'INACTIVE'
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
