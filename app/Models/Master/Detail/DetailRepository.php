<?php
namespace App\Models\Master\Detail;

use DB;

class DetailRepository
{

    protected $model;
      
    public function __construct(Detail $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                                'daftar_form_detail.id',
                                'daftar_form_detail.nama_form',
                                'daftar_form_detail.path'
                            )->searchOrder($request, [
                                'daftar_form_detail.nama_form',
                                'daftar_form_detail.path'
                            ])
                ->where('is_actived','1')
                ->paginate($limit);

        return (new DetailTransformer)->transformPaginate($model);
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
        $model->nama_form = $request->input('nama_form');
        $model->path = $request->input('path');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->nama_form = $request->input('nama_form');
        $model->path = $request->input('path');
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

    public function getAjaxOptions($suboutputId) {
        $options = [];
        $rows = $this->model->select('id','nama_form')->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_form
            ];
        }
        
        return $options;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_form')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_form;
        }
        
        return $options;
    }
}