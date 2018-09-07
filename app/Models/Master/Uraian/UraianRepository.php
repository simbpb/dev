<?php
namespace App\Models\Master\Uraian;

use DB;

class UraianRepository
{

    protected $model;
      
    public function __construct(Uraian $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'master_uraian.id',
                        'master_uraian.nama_uraian',
                        'master_output.nama_output',
                        'master_suboutput.nama_suboutput',
                        'master_uraian.master',
                        'master_uraian.master_id'
                   )->join('master_output','master_output.id','=','master_uraian.output_id')
                    ->join('master_suboutput','master_suboutput.id','=','master_uraian.suboutput_id')
                    ->searchOrder($request, [
                        'master_uraian.nama_uraian',
                        'master_output.nama_output',
                        'master_suboutput.nama_suboutput'
                    ])->paginate($limit);

        return (new UraianTransformer)->transformPaginate($model);
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
        $model->kdprog_id = 1;
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->nama_uraian = $request->input('nama_uraian');
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
        $model->kdprog_id = 1;
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->nama_uraian = $request->input('nama_uraian');
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

    public function getDetailUraian($request) {
        $data = [];
        if (!$request->get('output_id') || !$request->get('suboutput_id') 
            || !$request->get('sasaran_id') || !$request->get('volume_id')) {
            $data['content'] = '';
        } else {
            $detail = $this->model->select('id','nama_uraian')->where('output_id', $request->get('output_id'))
                        ->where('suboutput_id', $request->get('suboutput_id'))
                        ->where('sasaran_id', $request->get('sasaran_id'))
                        ->where('volume_id', $request->get('volume_id'))
                        ->first();
            $data['id'] = ($detail) ? $detail->id : '';
            $data['content'] = ($detail) ? $detail->nama_uraian : '';
        }

        return $data;
    }

    public function getOptions() {
        $options = [];
        $rows = $this->model->select('id','nama_uraian')->get();

        foreach($rows as $row) {
            $options[$row->id] = $row->nama_uraian;
        }
        
        return $options;
    }
}