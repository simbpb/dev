<?php
namespace App\Models\User;

use DB;
use Auth;
use App\Enum\Status;
use App\Enum\Access;
use App\Models\User\User;

class UserRepository
{

      protected $model;
      
      public function __construct(User $user) {
         $this->model = $user;
      }

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;

         if (!empty($request) && $request['field'] == 'group') {
            $request['field'] = 'roles.name';
         }
         
         $model = $this->model->select('users.id','users.fullname','users.username','users.email','users.status','roles.name as group')
                     ->where('users.id','<>',Access::DEVELOPER)
                     ->leftJoin('roles','roles.id','=','users.role_id')
                     ->searchOrder($request, ['users.fullname','users.username','users.email','status','roles.name'])
                     ->paginate($limit);
                     
         return (new UserTransformer)->transformPaginate($model);
      }

      public function find($id)
      {
         $model = $this->model->find($id);
         return (new UserTransformer)->transformDetail($model);
      }
     
      public function create($params = [])
      {
            DB::beginTransaction();

            $model = $this->model;
            $model->fullname = $params['fullname'];
            $model->username = $params['username'];
            $model->email = $params['email'];
            $model->password = bcrypt($params['password']);
            $model->role_id = $params['role_id'];
            $model->status = (!empty($params['status'])) ? $params['status'] : Status::INACTIVE;
            $model->save();

            DB::commit();
            return true;
      }

      public function update($id, $params = [])
      {
            DB::beginTransaction();
            $model = $this->model->find($id);
            $model->fullname = $params['fullname'];
            $model->username = $params['username'];
            $model->email = $params['email'];
            if (!empty($params['password'])) {
               $model->password = bcrypt($params['password']);
            }
            $model->role_id = $params['role_id'];
            $model->status = (!empty($params['status'])) ? $params['status'] : Status::INACTIVE;
            $model->save();

            DB::commit();
            return true;
      }

      public function destroy($id)
      {
            DB::beginTransaction();
            $this->model->find($id)->delete();
            DB::commit();
            return true;
      }

      public function changePassword($id, $password)
      {
            DB::beginTransaction();
            $model = $this->model->find($id);
            $model->password = bcrypt($password);
            $model->save();
            DB::commit();
            return true;
      }
}