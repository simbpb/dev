<?php
namespace App\Models\Detail\PengelolaTeknisBersertifikasi;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class PengelolaTeknisBersertifikasiRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/pengelola-teknis-bersertifikasi/file-sertifikat-pengelola-teknis';

      
    public function __construct(
        PengelolaTeknisBersertifikasi $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_pengelola_teknis_bersertifikasi.id',
                        'tbl_detail_pengelola_teknis_bersertifikasi.thn_periode_keg',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_propinsi',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
                        'tbl_detail_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.nama_pejabat',
						'tbl_detail_pengelola_teknis_bersertifikasi.jabatan',
						'tbl_detail_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'tbl_detail_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'tbl_detail_pengelola_teknis_bersertifikasi.asal_universitas',
						'tbl_detail_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
                        'tbl_detail_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_pengelola_teknis_bersertifikasi.thn_periode_keg',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_propinsi',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
                        'tbl_detail_pengelola_teknis_bersertifikasi.no_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.tgl_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.nama_pejabat',
						'tbl_detail_pengelola_teknis_bersertifikasi.jabatan',
						'tbl_detail_pengelola_teknis_bersertifikasi.nama_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.no_ktp_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.dinas_instansi_asal_unit_org',
						'tbl_detail_pengelola_teknis_bersertifikasi.alamat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.pendidikan_terakhir_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.jurusan_pendidikan_terakhir',
						'tbl_detail_pengelola_teknis_bersertifikasi.asal_universitas',
						'tbl_detail_pengelola_teknis_bersertifikasi.file_sertifikat_pengelola_teknis',
                        'tbl_detail_pengelola_teknis_bersertifikasi.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new PengelolaTeknisBersertifikasiTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new PengelolaTeknisBersertifikasiTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_sertifikat_pengelola_teknis')) {
			$image = $request->file('file_sertifikat_pengelola_teknis');
			$filename = str_slug($request->file_sertifikat_pengelola_teknis).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sertifikat_pengelola_teknis = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sertifikat_pengelola_teknis = $request->input('no_sertifikat_pengelola_teknis');
		$model->tgl_sertifikat_pengelola_teknis = $request->input('tgl_sertifikat_pengelola_teknis');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_pengelola_teknis = $request->input('nama_pengelola_teknis');
		$model->no_ktp_pengelola_teknis = $request->input('no_ktp_pengelola_teknis');
		$model->dinas_instansi_asal_unit_org = $request->input('dinas_instansi_asal_unit_org');
		$model->alamat_pengelola_teknis = $request->input('alamat_pengelola_teknis');
		$model->pendidikan_terakhir_pengelola_teknis = $request->input('pendidikan_terakhir_pengelola_teknis');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		
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
        
        
		if ($request->hasFile('file_sertifikat_pengelola_teknis')) {
			$image = $request->file('file_sertifikat_pengelola_teknis');
			if (File::exists(public_path($model->file_sertifikat_pengelola_teknis))) {
				File::delete(public_path($model->file_sertifikat_pengelola_teknis));
			}
			$filename = str_slug($request->file_sertifikat_pengelola_teknis).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sertifikat_pengelola_teknis = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sertifikat_pengelola_teknis = $request->input('no_sertifikat_pengelola_teknis');
		$model->tgl_sertifikat_pengelola_teknis = $request->input('tgl_sertifikat_pengelola_teknis');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_pengelola_teknis = $request->input('nama_pengelola_teknis');
		$model->no_ktp_pengelola_teknis = $request->input('no_ktp_pengelola_teknis');
		$model->dinas_instansi_asal_unit_org = $request->input('dinas_instansi_asal_unit_org');
		$model->alamat_pengelola_teknis = $request->input('alamat_pengelola_teknis');
		$model->pendidikan_terakhir_pengelola_teknis = $request->input('pendidikan_terakhir_pengelola_teknis');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		
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