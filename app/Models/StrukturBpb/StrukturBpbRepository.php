<?php
namespace App\Models\StrukturBpb;

use Auth;

class StrukturBpbRepository
{

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;

         if (!empty($request) && $request['column'] == 'id') {
            $request['column'] = 'struktur_bpb.id_struktur';
         }

         $model = StrukturBpb::select(
                     'struktur_bpb.id_struktur',
                     'struktur_bpb.id_level',
                     'struktur_bpb.kd_struktur',
                     'struktur_bpb.kd_id',
                     'struktur_bpb.uraian',
                     'struktur_bpb.jenis_volume',
                     'master_level.nama_level'
                 )->leftJoin('master_level','master_level.id_level','=','struktur_bpb.id_level')
                  ->searchOrder($request, [
                     'struktur_bpb.id_struktur',
                     'struktur_bpb.id_level',
                     'struktur_bpb.kd_struktur',
                     'struktur_bpb.kd_id',
                     'struktur_bpb.uraian',
                     'struktur_bpb.jenis_volume',
                     'master_level.nama_level'
                  ])->paginate($limit);

         return $model;
      }

      public function find($id)
      {
         return StrukturBpb::find($id);
      }
     
      public function create($params = [])
      {
         $userId = Auth::user()->user_id;
         $model = new StrukturBpb();
         $model->id_level = $params['level'];
         $model->kd_id = '01';
         $model->kd_pupr = '001';
         $model->kd_struktur = $params['level'].'000.000';
         $model->kd_output = $params['output'];
         $model->parent_id = $params['output'];
         $model->kd_suboutput = !empty($params['suboutput']) ? $params['suboutput'] : '000';
         $model->kd_komponen = !empty($params['komponen']) ? $params['komponen'] : '000';
         $model->kd_aktivitas_1 = !empty($params['aktifitas1']) ? $params['aktifitas1'] : '00';
         $model->kd_aktivitas_2 = !empty($params['aktifitas2']) ? $params['aktifitas2'] : '00';
         $model->kd_aktivitas_3 = !empty($params['aktifitas3']) ? $params['aktifitas3'] : '00';
         $model->kd_aktivitas_4 = !empty($params['aktifitas4']) ? $params['aktifitas4'] : '00';
         $model->uraian = $params['uraian'];
         $model->sub_bid = $params['sub_bidang'];
         $model->jenis_volume = $params['jenis_volume'];
         $model->isActive = '1';
         $model->created_by = $userId;
         $model->updated_by = $userId;
         return $model->save();
      }

      public function update($id, $params = [])
      {
         $userId = Auth::user()->user_id;
         $model = StrukturBpb::find($id);
         $model->id_level = $params['level'];
         $model->kd_id = '01';
         $model->kd_pupr = '001';
         $model->kd_struktur = $params['level'].'000.000';
         $model->kd_output = $params['output'];
         $model->parent_id = $params['output'];
         $model->kd_suboutput = !empty($params['suboutput']) ? $params['suboutput'] : '000';
         $model->kd_komponen = !empty($params['komponen']) ? $params['komponen'] : '000';
         $model->kd_aktivitas_1 = !empty($params['aktifitas1']) ? $params['aktifitas1'] : '00';
         $model->kd_aktivitas_2 = !empty($params['aktifitas2']) ? $params['aktifitas2'] : '00';
         $model->kd_aktivitas_3 = !empty($params['aktifitas3']) ? $params['aktifitas3'] : '00';
         $model->kd_aktivitas_4 = !empty($params['aktifitas4']) ? $params['aktifitas4'] : '00';
         $model->uraian = $params['uraian'];
         $model->sub_bid = $params['sub_bidang'];
         $model->jenis_volume = $params['jenis_volume'];
         $model->isActive = '1';
         $model->created_by = $userId;
         $model->updated_by = $userId;
         return $model->save();
      }

      public function delete($id)
      {
         return StrukturBpb::find($id)->delete();
      }
}