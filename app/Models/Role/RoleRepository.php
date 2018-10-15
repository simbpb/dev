<?php
namespace App\Models\Role;

use DB;
use App\Enum\Category;

class RoleRepository
{

      protected $model;
      
      public function __construct(Role $model) {
         $this->model = $model;
      }

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
         
         $model = $this->model->select('roles.id','roles.name','roles.category')
                     ->searchOrder($request, ['roles.name','roles.category'])
                     ->paginate($limit);

         return (new RoleTransformer)->transformPaginate($model);
      }

      public function find($id)
      {
         $model = $this->model->find($id);
         return $model;
      }

      protected function mappingArray($permissions, $roleId)
      {
         $data = [];
         if (count($permissions) > 0) {
            foreach ($permissions as $permission) {
               $data[] = [
                   'role_id' => $roleId,
                   'permission_id' => $permission,
               ];
            }
         }

         return $data;
      }
     
      public function create($request)
      {
         DB::beginTransaction();
         $model = $this->model;
         $model->name = $request->input('name');
         $model->category = $request->input('category');
         $model->save();

         $data = $this->mappingArray($request->input('permissions'), $model->id);
         if (count($data) > 0) {
            DB::table('role_permission')->insert($data);
         }

         DB::commit();
         return true;
      }

      public function update($id, $request)
      {
         DB::beginTransaction();
         $model = $this->model->find($id);
         $model->name = $request->input('name');
         $model->category = $request->input('category');
         $model->save();

         $data = $this->mappingArray($request->input('permissions'), $id);
         DB::table('role_permission')->where('role_id', '=', $id)->delete();
         DB::table('role_permission')->insert($data);

         DB::commit();
         return true;
      }

      public function destroy($id)
      {
         DB::beginTransaction();
         $model = $this->model->find($id);
         DB::table('role_permission')->where('role_id', '=', $id)->delete();
         $model->delete();
         DB::commit();
         return true;
      }

      public function getOptions() 
      {
         $roles = $this->model->select('id','name')->get();
         $options = [];
         
         foreach($roles as $role) {
            $options[$role->id] = $role->name;
         }

         return $options;
      }

      public function getCategories() 
      {
         $options[Category::PUSAT] = 'Pusat';
         $options[Category::PROVINSI] = 'Provinsi';
         $options[Category::KABKOT] = 'Kabupaten/Kota';
         $options[Category::KI] = 'KI';

         return $options;
      }
      
}