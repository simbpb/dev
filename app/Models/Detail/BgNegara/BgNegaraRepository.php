<?php
namespace App\Models\Detail\BgNegara;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class BgNegaraRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/bg-negara/dokumentasi';

      
    public function __construct(
        BgNegara $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bg_negara.id',
                        'tbl_detail_bg_negara.thn_periode_keg',
                        'tbl_detail_bg_negara.lokasi_kode',
                        'tbl_detail_bg_negara.nama_propinsi',
                        'tbl_detail_bg_negara.nama_kabupatenkota',
                        'tbl_detail_bg_negara.nama_bg_negara',
						'tbl_detail_bg_negara.instansi_pemilik_bg_negara',
						'tbl_detail_bg_negara.alamat_bg_negara',
						'tbl_detail_bg_negara.luas_bg_negara_m2',
						'tbl_detail_bg_negara.titik_koordinat',
						'tbl_detail_bg_negara.dokumentasi'
                    )->searchOrder($request, [
                        'tbl_detail_bg_negara.thn_periode_keg',
                        'tbl_detail_bg_negara.lokasi_kode',
                        'tbl_detail_bg_negara.nama_propinsi',
                        'tbl_detail_bg_negara.nama_kabupatenkota',
                        'tbl_detail_bg_negara.nama_bg_negara',
						'tbl_detail_bg_negara.instansi_pemilik_bg_negara',
						'tbl_detail_bg_negara.alamat_bg_negara',
						'tbl_detail_bg_negara.luas_bg_negara_m2',
						'tbl_detail_bg_negara.titik_koordinat',
						'tbl_detail_bg_negara.dokumentasi'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new BgNegaraTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BgNegaraTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
        $model->nama_bg_negara = $request->input('nama_bg_negara');
$model->instansi_pemilik_bg_negara = $request->input('instansi_pemilik_bg_negara');
$model->alamat_bg_negara = $request->input('alamat_bg_negara');
$model->luas_bg_negara_m2 = $request->input('luas_bg_negara_m2');
$model->titik_koordinat = $request->input('titik_koordinat');

        $model->is_actived = 'ACTIVE';
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			if (File::exists(public_path($model->dokumentasi))) {
				File::delete(public_path($model->dokumentasi));
			}
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
        $model->nama_bg_negara = $request->input('nama_bg_negara');
$model->instansi_pemilik_bg_negara = $request->input('instansi_pemilik_bg_negara');
$model->alamat_bg_negara = $request->input('alamat_bg_negara');
$model->luas_bg_negara_m2 = $request->input('luas_bg_negara_m2');
$model->titik_koordinat = $request->input('titik_koordinat');

        $model->is_actived = 'ACTIVE';
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