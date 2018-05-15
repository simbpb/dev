<?php
namespace App\Models\StrukturBpb;


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
         $model = new StrukturBpb();
         $model->nama = $params['nama'];
         $model->nip = $params['nip'];
         $model->role_id = $params['role_id'];
         $model->username = $params['username'];
         $model->email = $params['email'];
         $model->password = bcrypt($params['password']);
         $model->lokasi_kode = rand(1,10);
         $model->status = '1';
         $model->created_by = '1';
         $model->updated_by = '1';
         return $model->save();
      }

      public function update($id, $params = [])
      {
         $model = StrukturBpb::find($id);
         $model->nama = $params['nama'];
         $model->nip = $params['nip'];
         $model->role_id = $params['role_id'];
         $model->username = $params['username'];
         $model->email = $params['email'];
         if (!empty($params['password'])) {
            $model->password = bcrypt($params['password']);
         }
         $model->lokasi_kode = 'sss';
         $model->status = '1';
         $model->created_by = '1';
         $model->updated_by = '1';
         return $model->save();
      }

      public function delete($id)
      {
         return StrukturBpb::find($id)->delete();
      }
}