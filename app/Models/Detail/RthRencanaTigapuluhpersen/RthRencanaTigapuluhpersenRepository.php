<?php
namespace App\Models\Detail\RthRencanaTigapuluhpersen;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class RthRencanaTigapuluhpersenRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/rth-rencana-tigapuluhpersen/file-dok-rencana-kota-hijau-rakh';

      
    public function __construct(
        RthRencanaTigapuluhpersen $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rth_rencana_tigapuluhpersen.id',
                        'tbl_detail_rth_rencana_tigapuluhpersen.thn_periode_keg',
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
        $model = $this->model;

        
		if ($request->hasFile('file_dok_rencana_kota_hijau_rakh')) {
			$image = $request->file('file_dok_rencana_kota_hijau_rakh');
			$filename = str_slug($request->file_dok_rencana_kota_hijau_rakh).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_dok_rencana_kota_hijau_rakh = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->dok_rencana_kota_hijau_rakh = $request->input('dok_rencana_kota_hijau_rakh');
		$model->nama_dokumen_perencanaan = $request->input('nama_dokumen_perencanaan');
		$model->dok_disusun_tahun = $request->input('dok_disusun_tahun');
		$model->dok_disahkan_oleh = $request->input('dok_disahkan_oleh');
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
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
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->dok_rencana_kota_hijau_rakh = $request->input('dok_rencana_kota_hijau_rakh');
		$model->nama_dokumen_perencanaan = $request->input('nama_dokumen_perencanaan');
		$model->dok_disusun_tahun = $request->input('dok_disusun_tahun');
		$model->dok_disahkan_oleh = $request->input('dok_disahkan_oleh');
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
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