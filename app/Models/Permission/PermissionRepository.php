<?php
namespace App\Models\Permission;

use DB;

class PermissionRepository
{

    protected $model;
      
    public function __construct(Permission $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select('permissions.id','permissions.name','permissions.alias','menus.name as menu')
                ->leftJoin('menus','menus.id','=','permissions.menu_id')
                ->searchOrder($request, ['permissions.name','permissions.alias'])
                ->paginate($limit);

        return (new PermissionTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return $model;
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $model = $this->model;
        $model->name = $request->input('name');
        $model->alias = $request->input('alias');
        $model->menu_id = !empty($request->input('menu_id')) ? $request->input('menu_id') : 0;
        $model->save();
        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->name = $request->input('name');
        $model->alias = $request->input('alias');
        $model->menu_id = !empty($request->input('menu_id')) ? $request->input('menu_id') : 0;
        $model->save();
        DB::commit();
        return true;
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->delete();
        DB::commit();
        return true;
    }
}