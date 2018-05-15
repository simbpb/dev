<?php
namespace App\Models\Auth;


class UserBpbRepository
{

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;

         if (!empty($request) && $request['column'] == 'role') {
            $request['column'] = 'master_role_user.nama_role_user';
         }

         if (!empty($request) && $request['column'] == 'id') {
            $request['column'] = 'tbl_user_sibpb.user_id';
         }

         $model = UserBpb::select(
                     'tbl_user_sibpb.user_id',
                     'tbl_user_sibpb.nip',
                     'tbl_user_sibpb.username',
                     'tbl_user_sibpb.nama',
                     'tbl_user_sibpb.email',
                     'master_role_user.nama_role_user as role',
                     'tbl_user_sibpb.created_date'
                 )->leftJoin('master_role_user','master_role_user.id_role_user','=','tbl_user_sibpb.role_id')
                  ->searchOrder($request, [
                     'tbl_user_sibpb.nip',
                     'tbl_user_sibpb.username',
                     'tbl_user_sibpb.nama',
                     'tbl_user_sibpb.email',
                     'master_role_user.nama_role_user'
                  ])->paginate($limit);

         return $model;
      }

      public function find($id)
      {
         return UserBpb::find($id);
      }
     
      public function create($params = [])
      {
         $model = new UserBpb();
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
         $model = UserBpb::find($id);
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
         return UserBpb::find($id)->delete();
      }
}