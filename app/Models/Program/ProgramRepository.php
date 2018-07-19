<?php
namespace App\Models\Program;

use DB;
use Auth;

class ProgramRepository
{

    protected $model;
      
    public function __construct(Program $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_program.id',
                        'tbl_program.thn_prog',
                        'tbl_renstra.uraian_renstra',
                        'master_sasaran.nama_sasaran'
                   )->join('tbl_renstra','tbl_renstra.id','=','tbl_program.renstra_id')
                    ->join('master_sasaran','master_sasaran.id','=','tbl_program.sasaran_id')
                    ->searchOrder($request, ['tbl_program.thn_prog','tbl_renstra.uraian_renstra','master_sasaran.nama_sasaran'])
                    ->paginate($limit);

        return (new ProgramTransformer)->transformPaginate($model);
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
        $model->renstra_id = $request->input('renstra_id');
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->uraian_id = $request->input('uraian_id');
        $model->thn_prog = $request->input('thn_prog');
        $model->exe_summary_prog = $request->input('exe_summary_prog');
        $model->detail_kdprog_id = '001';
        $model->subdit_id = Auth::user()->subdit_id;
        $model->save();
        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->renstra_id = $request->input('renstra_id');
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->uraian_id = $request->input('uraian_id');
        $model->thn_prog = $request->input('thn_prog');
        $model->exe_summary_prog = $request->input('exe_summary_prog');
        $model->detail_kdprog_id = '001';
        $model->subdit_id = Auth::user()->subdit_id;
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
        return $options;
    }
}