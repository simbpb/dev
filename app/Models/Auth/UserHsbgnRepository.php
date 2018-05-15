<?php
namespace App\Models\Auth;


class UserHsbgnRepository
{

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;

         if (!empty($request) && $request['column'] == 'role') {
            $request['column'] = 'master_role_user.nama_role_user';
         }

         if (!empty($request) && $request['column'] == 'id') {
            $request['column'] = 'tbl_user_sihsbgn.user_id';
         }
         
         $model = UserHsbgn::select(
                     'tbl_user_sihsbgn.user_id',
                     'tbl_user_sihsbgn.nip',
                     'tbl_user_sihsbgn.username',
                     'tbl_user_sihsbgn.nama',
                     'tbl_user_sihsbgn.email',
                     'master_role_user.nama_role_user as role'
                 )->leftJoin('master_role_user','master_role_user.id_role_user','=','tbl_user_sihsbgn.role_id')
                  ->searchOrder($request, [
                     'tbl_user_sihsbgn.nip',
                     'tbl_user_sihsbgn.username',
                     'tbl_user_sihsbgn.nama',
                     'tbl_user_sihsbgn.email',
                     'master_role_user.nama_role_user'
                  ])->paginate($limit);

         return $model;
      }

      public function find($id)
      {
         return UserHsbgn::find($id);
      }
     
      public function create($params = [])
      {
         $model = new UserHsbgn();
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
         $model = UserHsbgn::find($id);
         $model->nama = $params['nama'];
         $model->nip = $params['nip'];
         $model->role_id = $params['role_id'];
         $model->username = $params['username'];
         $model->email = $params['email'];
         if (!empty($params['password'])) {
            $model->password = bcrypt($params['password']);
         }
         $model->lokasi_kode = rand(1,10);
         $model->status = '1';
         $model->created_by = '1';
         $model->updated_by = '1';
         return $model->save();
      }

      public function delete($id)
      {
         return UserHsbgn::find($id)->delete();
      }
}