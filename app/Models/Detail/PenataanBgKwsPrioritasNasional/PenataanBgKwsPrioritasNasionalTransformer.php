<?php
namespace App\Models\Detail\PenataanBgKwsPrioritasNasional;

use App\Enum\Status;

class PenataanBgKwsPrioritasNasionalTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'indeks_resiko' => $model->indeks_resiko,
'tingkat_resiko' => $model->tingkat_resiko,
'risiko_bencana_dominan' => $model->risiko_bencana_dominan,
'struktur_ruang' => $model->struktur_ruang,
'nama_kegiatan' => $model->nama_kegiatan,
'tahun_anggaran' => $model->tahun_anggaran,
'sumber_pendanaan' => $model->sumber_pendanaan,
'alokasi_anggaran' => $model->alokasi_anggaran,
'volume_pekerjaan' => $model->volume_pekerjaan,
'instansi_unit' => $model->instansi_unit,
'lokasi_kegiatan' => $model->lokasi_kegiatan,
'titik_koordinat_lat' => $model->titik_koordinat_lat,
'titik_koordinat_long' => $model->titik_koordinat_long,
'status_aset' => $model->status_aset,

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
                'indeks_resiko' => $model->indeks_resiko,
'tingkat_resiko' => $model->tingkat_resiko,
'risiko_bencana_dominan' => $model->risiko_bencana_dominan,
'struktur_ruang' => $model->struktur_ruang,
'nama_kegiatan' => $model->nama_kegiatan,
'tahun_anggaran' => $model->tahun_anggaran,
'sumber_pendanaan' => $model->sumber_pendanaan,
'alokasi_anggaran' => $model->alokasi_anggaran,
'volume_pekerjaan' => $model->volume_pekerjaan,
'instansi_unit' => $model->instansi_unit,
'lokasi_kegiatan' => $model->lokasi_kegiatan,
'titik_koordinat_lat' => $model->titik_koordinat_lat,
'titik_koordinat_long' => $model->titik_koordinat_long,
'status_aset' => $model->status_aset,

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
