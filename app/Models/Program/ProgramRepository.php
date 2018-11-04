<?php
namespace App\Models\Program;

use DB;
use Auth;
use App\Enum\Status;

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
                        'master_sasaran.nama_sasaran',
                        'tbl_program.status'
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
        $model->visi_id = $request->input('visi_id');
        $model->misi_id = $request->input('misi_id');
        $model->renstra_id = $request->input('renstra_id');
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->uraian_id = $request->input('uraian_id');
        $model->thn_prog = $request->input('thn_prog');
        $model->exe_summary_prog = $request->input('exe_summary_prog');
        $model->status = ($request->input('status')) ? $request->input('status') : Status::INACTIVE;
        $model->subdit_id = $request->input('subdit_id');
        $model->tupoksi_id = $request->input('tupoksi_id');
        $model->komponen_id = $request->input('komponen_id');
        $model->akt1_id = $request->input('akt1_id');
        $model->akt2_id = $request->input('akt2_id');
        $model->akt3_id = $request->input('akt3_id');
        $model->akt4_id = $request->input('akt4_id');
        $model->save();
        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);
        $model->visi_id = $request->input('visi_id');
        $model->misi_id = $request->input('misi_id');
        $model->renstra_id = $request->input('renstra_id');
        $model->output_id = $request->input('output_id');
        $model->suboutput_id = $request->input('suboutput_id');
        $model->sasaran_id = $request->input('sasaran_id');
        $model->volume_id = $request->input('volume_id');
        $model->uraian_id = $request->input('uraian_id');
        $model->thn_prog = $request->input('thn_prog');
        $model->exe_summary_prog = $request->input('exe_summary_prog');
        $model->status = ($request->input('status')) ? $request->input('status') : Status::INACTIVE;
        $model->subdit_id = $request->input('subdit_id');
        $model->tupoksi_id = $request->input('tupoksi_id');
        $model->komponen_id = $request->input('komponen_id');
        $model->akt1_id = $request->input('akt1_id');
        $model->akt2_id = $request->input('akt2_id');
        $model->akt3_id = $request->input('akt3_id');
        $model->akt4_id = $request->input('akt4_id');
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