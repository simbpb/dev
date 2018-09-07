<?php
namespace App\Models\Master\Sasaran;

use DB;

class SasaranRepository
{

    protected $model;
      
    public function __construct(Sasaran $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                                'master_sasaran.id',
                                'master_sasaran.nama_sasaran',
                                'master_sasaran.master',
                                'master_sasaran.master_id',
                                'master_suboutput.nama_suboutput',
                                'master_output.nama_output'
                            )
                            ->leftJoin('master_output','master_output.id','=','master_sasaran.output_id')
                            ->leftJoin('master_suboutput','master_suboutput.id','=','master_sasaran.suboutput_id')
                            ->searchOrder($request, [
                                'master_sasaran.nama_sasaran',
                                'master_sasaran.master',
                                'master_sasaran.master_id',
                                'master_suboutput.nama_suboutput',
                                'master_output.nama_output'
                            ])
                ->paginate($limit);

        return (new SasaranTransformer)->transformPaginate($model);
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
        $model->nama_sasaran = $request->input('nama_sasaran');
        $model->kdprog_id = '000';
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->master = $request->input('master');
        $model->save();
        $masterId = $this->model->find($model->id);
        $masterId->master_id = $request->input('master').sprintf("%03d", $model->id);
        $masterId->save();
        $model->details()->attach($request->input('detail_ids'));
        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->nama_sasaran = $request->input('nama_sasaran');
        $model->kdprog_id = '000';
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->master = $request->input('master');
        $model->master_id = $request->input('master').sprintf("%03d", $id);
        $model->save();
        $model->details()->sync($request->input('detail_ids'));
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
        $rows = $this->model->select('id','nama_sasaran')
                            ->where('suboutput_id', $suboutputId)->get();

        foreach($rows as $row) {
            $options[] = [
                'id' => $row->id,
                'text' => $row->nama_sasaran
            ];
        }
        
        return $options;
    }
}