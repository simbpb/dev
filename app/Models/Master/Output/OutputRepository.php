<?php
namespace App\Models\Master\Output;

use DB;

class OutputRepository
{

    protected $model;
      
    public function __construct(Output $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select('master_output.id','master_output.nama_output','master_output.master','master_output.master_id')
                ->searchOrder($request, ['master_output.nama_output','master_output.master','master_output.master_id'])
                ->paginate($limit);

        return (new OutputTransformer)->transformPaginate($model);
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
        $model->nama_output = $request->input('nama_output');
        $model->kdprog_id = '000';
        $model->master = $request->input('master');
        $model->save();
        $masterId = $this->model->find($model->id);
        $masterId->master_id = $request->input('master').sprintf("%03d", $model->id);
        $masterId->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->nama_output = $request->input('nama_output');
        $model->kdprog_id = '000';
        $model->master = $request->input('master');
        $model->master_id = $request->input('master').sprintf("%03d", $id);
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

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_output')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_output;
        }
        
        return $options;
    }
}