<?php
namespace App\Models\Master\SubOutput;

use DB;

class SubOutputRepository
{

    protected $model;
      
    public function __construct(SubOutput $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                                'master_suboutput.id',
                                'master_suboutput.nama_suboutput',
                                'master_suboutput.master',
                                'master_suboutput.master_id',
                                'master_output.nama_output')
                            ->leftJoin('master_output','master_output.id','=','master_suboutput.output_id')
                            ->searchOrder($request, [
                                'master_suboutput.nama_suboutput',
                                'master_suboutput.master',
                                'master_suboutput.master_id'
                            ])
                ->paginate($limit);

        return (new SubOutputTransformer)->transformPaginate($model);
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
        $model->nama_suboutput = $request->input('nama_suboutput');
        $model->kdprog_id = '000';
        $model->output_id = $request->input('output_id');
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
        $model->nama_suboutput = $request->input('nama_suboutput');
        $model->kdprog_id = '000';
        $model->output_id = $request->input('output_id');
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

    public function getAjaxOptions($outputId) {
        $options = [];
        $rows = $this->model->select('id','nama_suboutput')
                    ->where('output_id',$outputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_suboutput
            ];
        }
        
        return $options;
    }
}