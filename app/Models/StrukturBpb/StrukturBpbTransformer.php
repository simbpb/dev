<?php
namespace App\Models\StrukturBpb;

use App\Helpers\DateFormat;

class StrukturBpbTransformer{

   public function transformPaginate($model) {

      $data = $model->getCollection()->transform(function($model, $key) {
            return [
               'id' => $model->id_struktur,
               'id_level' => $model->id_level,
               'kd_struktur' => $model->kd_struktur,
               'kd_id' => $model->kd_id,
               'uraian' => $model->uraian,
               'nama_level' => $model->nama_level,
               'jenis_volume' => $model->jenis_volume,
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
