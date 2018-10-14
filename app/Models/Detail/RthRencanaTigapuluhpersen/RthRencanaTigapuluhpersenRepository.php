<?php
namespace App\Models\Detail\RthRencanaTigapuluhpersen;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class RthRencanaTigapuluhpersenRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/rth-rencana-tigapuluhpersen/file-dok-rencana-kota-hijau-rakh';

      
    public function __construct(
        RthRencanaTigapuluhpersen $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rth_rencana_tigapuluhpersen.id',
                        'tbl_detail_rth_rencana_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_rencana_tigapuluhpersen.lokasi_kode',
                        'tbl_detail_rth_rencana_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'tbl_detail_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'tbl_detail_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'tbl_detail_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'tbl_detail_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
                        'tbl_detail_rth_rencana_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_rth_rencana_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_rencana_tigapuluhpersen.lokasi_kode',
                        'tbl_detail_rth_rencana_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_rencana_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_rencana_tigapuluhpersen.dok_rencana_kota_hijau_rakh',
						'tbl_detail_rth_rencana_tigapuluhpersen.file_dok_rencana_kota_hijau_rakh',
						'tbl_detail_rth_rencana_tigapuluhpersen.nama_dokumen_perencanaan',
						'tbl_detail_rth_rencana_tigapuluhpersen.dok_disusun_tahun',
						'tbl_detail_rth_rencana_tigapuluhpersen.dok_disahkan_oleh',
                        'tbl_detail_rth_rencana_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new RthRencanaTigapuluhpersenTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RthRencanaTigapuluhpersenTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_dok_rencana_kota_hijau_rakh')) {
			$image = $request->file('file_dok_rencana_kota_hijau_rakh');
			$filename = str_slug($request->file_dok_rencana_kota_hijau_rakh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_dok_rencana_kota_hijau_rakh = $this->basePath1.'/'.$filename;
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
        $model->dok_rencana_kota_hijau_rakh = $request->input('dok_rencana_kota_hijau_rakh');
$model->nama_dokumen_perencanaan = $request->input('nama_dokumen_perencanaan');
$model->dok_disusun_tahun = $request->input('dok_disusun_tahun');
$model->dok_disahkan_oleh = $request->input('dok_disahkan_oleh');
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
        
        
		if ($request->hasFile('file_dok_rencana_kota_hijau_rakh')) {
			$image = $request->file('file_dok_rencana_kota_hijau_rakh');
			if (File::exists(public_path($model->file_dok_rencana_kota_hijau_rakh))) {
				File::delete(public_path($model->file_dok_rencana_kota_hijau_rakh));
			}
			$filename = str_slug($request->file_dok_rencana_kota_hijau_rakh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_dok_rencana_kota_hijau_rakh = $this->basePath1.'/'.$filename;
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
        $model->dok_rencana_kota_hijau_rakh = $request->input('dok_rencana_kota_hijau_rakh');
$model->nama_dokumen_perencanaan = $request->input('nama_dokumen_perencanaan');
$model->dok_disusun_tahun = $request->input('dok_disusun_tahun');
$model->dok_disahkan_oleh = $request->input('dok_disahkan_oleh');
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