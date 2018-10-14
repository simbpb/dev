<?php
namespace App\Models\Detail\RthStatusTigapuluhpersen;

use App\Enum\Status;

class RthStatusTigapuluhpersenTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'luas_wilayah_kab_kota' => $model->luas_wilayah_kab_kota,
'satuan_luas_wilayah_kab_kota' => $model->satuan_luas_wilayah_kab_kota,
'bentuk_rth' => $model->bentuk_rth,
'nama_kawasan' => $model->nama_kawasan,
'lokasi_kawasan' => $model->lokasi_kawasan,
'titik_koordinat_lat' => $model->titik_koordinat_lat,
'titik_koordinat_long' => $model->titik_koordinat_long,
'luas_kawasan' => $model->luas_kawasan,
'satuan_luas_kawasan' => $model->satuan_luas_kawasan,
'status_aset' => $model->status_aset,
'bentuk_rth_private' => $model->bentuk_rth_private,
'nama_kawasan_rth_private' => $model->nama_kawasan_rth_private,
'lokasi_kawasan_rth_private' => $model->lokasi_kawasan_rth_private,
'titik_koordinat_lat_rth_private' => $model->titik_koordinat_lat_rth_private,
'titik_koordinat_long_rth_private' => $model->titik_koordinat_long_rth_private,
'luas_kawasan_private' => $model->luas_kawasan_private,
'satuan_luas_kawasan_private' => $model->satuan_luas_kawasan_private,
'status_aset_private' => $model->status_aset_private,

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
                'luas_wilayah_kab_kota' => $model->luas_wilayah_kab_kota,
'satuan_luas_wilayah_kab_kota' => $model->satuan_luas_wilayah_kab_kota,
'bentuk_rth' => $model->bentuk_rth,
'nama_kawasan' => $model->nama_kawasan,
'lokasi_kawasan' => $model->lokasi_kawasan,
'titik_koordinat_lat' => $model->titik_koordinat_lat,
'titik_koordinat_long' => $model->titik_koordinat_long,
'luas_kawasan' => $model->luas_kawasan,
'satuan_luas_kawasan' => $model->satuan_luas_kawasan,
'status_aset' => $model->status_aset,
'bentuk_rth_private' => $model->bentuk_rth_private,
'nama_kawasan_rth_private' => $model->nama_kawasan_rth_private,
'lokasi_kawasan_rth_private' => $model->lokasi_kawasan_rth_private,
'titik_koordinat_lat_rth_private' => $model->titik_koordinat_lat_rth_private,
'titik_koordinat_long_rth_private' => $model->titik_koordinat_long_rth_private,
'luas_kawasan_private' => $model->luas_kawasan_private,
'satuan_luas_kawasan_private' => $model->satuan_luas_kawasan_private,
'status_aset_private' => $model->status_aset_private,

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
