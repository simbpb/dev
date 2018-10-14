<?php
namespace App\Models\Detail\KwsCagarBudaya;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class KwsCagarBudayaRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/kws-cagar-budaya/file-SK-penetapan-cagar-budaya';

      
    public function __construct(
        KwsCagarBudaya $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kws_cagar_budaya.id',
                        'tbl_detail_kws_cagar_budaya.thn_periode_keg',
                        'tbl_detail_kws_cagar_budaya.lokasi_kode',
                        'tbl_detail_kws_cagar_budaya.nama_propinsi',
                        'tbl_detail_kws_cagar_budaya.nama_kabupatenkota',
                        'tbl_detail_kws_cagar_budaya.nama_aset_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.klasifikasi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.nama_instansi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.lokasi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.sk_penetapan',
						'tbl_detail_kws_cagar_budaya.file_SK_penetapan_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.tahun_penetapan',
                        'tbl_detail_kws_cagar_budaya.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_kws_cagar_budaya.thn_periode_keg',
                        'tbl_detail_kws_cagar_budaya.lokasi_kode',
                        'tbl_detail_kws_cagar_budaya.nama_propinsi',
                        'tbl_detail_kws_cagar_budaya.nama_kabupatenkota',
                        'tbl_detail_kws_cagar_budaya.nama_aset_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.klasifikasi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.nama_instansi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.lokasi_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.sk_penetapan',
						'tbl_detail_kws_cagar_budaya.file_SK_penetapan_cagar_budaya',
						'tbl_detail_kws_cagar_budaya.tahun_penetapan',
                        'tbl_detail_kws_cagar_budaya.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new KwsCagarBudayaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KwsCagarBudayaTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_SK_penetapan_cagar_budaya')) {
			$image = $request->file('file_SK_penetapan_cagar_budaya');
			$filename = str_slug($request->file_SK_penetapan_cagar_budaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_SK_penetapan_cagar_budaya = $this->basePath1.'/'.$filename;
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
        $model->nama_aset_cagar_budaya = $request->input('nama_aset_cagar_budaya');
$model->klasifikasi_cagar_budaya = $request->input('klasifikasi_cagar_budaya');
$model->nama_instansi_cagar_budaya = $request->input('nama_instansi_cagar_budaya');
$model->lokasi_cagar_budaya = $request->input('lokasi_cagar_budaya');
$model->sk_penetapan = $request->input('sk_penetapan');
$model->tahun_penetapan = $request->input('tahun_penetapan');
        $model->is_actived = $request->input('status');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        
		if ($request->hasFile('file_SK_penetapan_cagar_budaya')) {
			$image = $request->file('file_SK_penetapan_cagar_budaya');
			if (File::exists(public_path($model->file_SK_penetapan_cagar_budaya))) {
				File::delete(public_path($model->file_SK_penetapan_cagar_budaya));
			}
			$filename = str_slug($request->file_SK_penetapan_cagar_budaya).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_SK_penetapan_cagar_budaya = $this->basePath1.'/'.$filename;
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
        $model->nama_aset_cagar_budaya = $request->input('nama_aset_cagar_budaya');
$model->klasifikasi_cagar_budaya = $request->input('klasifikasi_cagar_budaya');
$model->nama_instansi_cagar_budaya = $request->input('nama_instansi_cagar_budaya');
$model->lokasi_cagar_budaya = $request->input('lokasi_cagar_budaya');
$model->sk_penetapan = $request->input('sk_penetapan');
$model->tahun_penetapan = $request->input('tahun_penetapan');
        $model->is_actived = $request->input('status');
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