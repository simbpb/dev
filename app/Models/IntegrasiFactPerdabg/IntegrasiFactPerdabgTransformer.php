<?php
namespace App\Models\IntegrasiFactPerdabg;

use App\Enum\Status;

class IntegrasiFactPerdabgTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => $model->propinsi_id,
            'kota_id' => $model->kota_id,
            'id_perda_bg' => $model->id_perda_bg,
			'id_info_wilayah' => $model->id_info_wilayah,
			'lokasi_kode' => $model->lokasi_kode,
			'uraian' => $model->uraian,
			'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
			'status_perdabg' => $model->status_perdabg,
			'keterangan' => $model->keterangan,
			'tgl_input_perdabg' => $model->tgl_input_perdabg,
			'tahun_perdabg' => $model->tahun_perdabg,
			'no_perdabg' => $model->no_perdabg,
			'luas_wilayah' => $model->luas_wilayah,
			'angka_luas_wilayah' => $model->angka_luas_wilayah,
			'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
			'isActive' => $model->isActive,
			'perdabg_sk' => $model->perdabg_sk,
			'last_update' => $model->last_update
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'id_perda_bg' => $model->id_perda_bg,
				'id_info_wilayah' => $model->id_info_wilayah,
				'lokasi_kode' => $model->lokasi_kode,
				'uraian' => $model->uraian,
				'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
				'status_perdabg' => $model->status_perdabg,
				'keterangan' => $model->keterangan,
				'tgl_input_perdabg' => $model->tgl_input_perdabg,
				'tahun_perdabg' => $model->tahun_perdabg,
				'no_perdabg' => $model->no_perdabg,
				'luas_wilayah' => $model->luas_wilayah,
				'angka_luas_wilayah' => $model->angka_luas_wilayah,
				'satuan_luas_wilayah' => $model->satuan_luas_wilayah,
				'isActive' => $model->isActive,
				'perdabg_sk' => $model->perdabg_sk,
				'last_update' => $model->last_update
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
