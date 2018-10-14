<?php
namespace App\Models\Detail\PenataanBgKwsPrioritasNasional;

use App\Enum\Status;

class PenataanBgKwsPrioritasNasionalTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'indeks_resiko' => $model->indeks_resiko,
'tingkat_resiko' => $model->tingkat_resiko,
'Risiko_Bencana_Dominan' => $model->Risiko_Bencana_Dominan,
'struktur_ruang' => $model->struktur_ruang,
'Nama_Kegiatan' => $model->Nama_Kegiatan,
'Tahun_Anggaran' => $model->Tahun_Anggaran,
'Sumber_Pendanaan' => $model->Sumber_Pendanaan,
'Alokasi_Anggaran' => $model->Alokasi_Anggaran,
'Volume_Pekerjaan' => $model->Volume_Pekerjaan,
'Instansi_Unit' => $model->Instansi_Unit,
'Lokasi_Kegiatan' => $model->Lokasi_Kegiatan,
'Titik_koordinat_lat' => $model->Titik_koordinat_lat,
'Titik_koordinat_log' => $model->Titik_koordinat_log,
'Status_Aset' => $model->Status_Aset,

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
                'indeks_resiko' => $model->indeks_resiko,
'tingkat_resiko' => $model->tingkat_resiko,
'Risiko_Bencana_Dominan' => $model->Risiko_Bencana_Dominan,
'struktur_ruang' => $model->struktur_ruang,
'Nama_Kegiatan' => $model->Nama_Kegiatan,
'Tahun_Anggaran' => $model->Tahun_Anggaran,
'Sumber_Pendanaan' => $model->Sumber_Pendanaan,
'Alokasi_Anggaran' => $model->Alokasi_Anggaran,
'Volume_Pekerjaan' => $model->Volume_Pekerjaan,
'Instansi_Unit' => $model->Instansi_Unit,
'Lokasi_Kegiatan' => $model->Lokasi_Kegiatan,
'Titik_koordinat_lat' => $model->Titik_koordinat_lat,
'Titik_koordinat_log' => $model->Titik_koordinat_log,
'Status_Aset' => $model->Status_Aset,

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
