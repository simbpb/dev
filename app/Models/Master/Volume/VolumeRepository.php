<?php
namespace App\Models\Master\Volume;

use DB;

class VolumeRepository
{

    protected $model;
      
    public function __construct(Volume $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                                'master_volume.id',
                                'master_volume.jenis_volume',
                                'master_volume.master',
                                'master_volume.master_id',
                                'master_output.nama_output')
                            ->leftJoin('master_output','master_output.id','=','master_volume.output_id')
                            ->searchOrder($request, [
                                'master_volume.jenis_volume',
                                'master_volume.master',
                                'master_volume.master_id',
                                'master_output.nama_output'
                            ])
                ->paginate($limit);

        return (new VolumeTransformer)->transformPaginate($model);
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
        $model->jenis_volume = $request->input('jenis_volume');
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
        $model->jenis_volume = $request->input('jenis_volume');
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
        $rows = $this->model->select('id','jenis_volume')
                            ->where('output_id', $outputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->jenis_volume
            ];
        }
        
        return $options;
    }
}