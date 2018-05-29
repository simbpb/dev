<?php
namespace App\Models\InfoWilayah;

use App\Helpers\DateFormat;

class InfoWilayahTransformer{

   public function transformPaginate($model) {

      $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id_info_kewilayahan,
               'provinsi' => $model->provinsi,
               'kabupatenkota' => $model->kabupatenkota,
               'luas_wilayah_km' => $model->luas_wilayah_km,
               'jml_penduduk_kota_2011' => $model->jml_penduduk_kota_2011,
               'jml_penduduk_kota_2012' => $model->jml_penduduk_kota_2012,
               'jml_penduduk_kota_2013' => $model->jml_penduduk_kota_2013,
               'jml_penduduk_kota_2014' => $model->jml_penduduk_kota_2014,
               'jml_penduduk_kota_2015' => $model->jml_penduduk_kota_2015,
               'jml_penduduk_desa_2011' => $model->jml_penduduk_desa_2011,
               'jml_penduduk_desa_2012' => $model->jml_penduduk_desa_2012,
               'jml_penduduk_desa_2013' => $model->jml_penduduk_desa_2013,
               'jml_penduduk_desa_2014' => $model->jml_penduduk_desa_2014,
               'jml_penduduk_desa_2015' => $model->jml_penduduk_desa_2015,
               'nama_klasifikasi_kota' => $model->nama_klasifikasi_kota
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

   public function transformDetail($model) {
      return [
         'level' => $model->id_level,
         'output' => $model->kd_output,
         'suboutput' => $model->kd_suboutput,
         'uraian' => $model->uraian,
         'jenis_volume' => $model->jenis_volume,
         'sub_bidang' => $model->sub_bid,
      ];
   }

}
