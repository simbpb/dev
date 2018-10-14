<?php
namespace App\Models\Detail\PengelolaTeknisBersertifikasi;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class PengelolaTeknisBersertifikasiRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/pengelola-teknis-bersertifikasi/file-Sertifikat-pengelola-teknis';

      
    public function __construct(
        PengelolaTeknisBersertifikasi $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_pengelola_teknis_bersertifikasi.id',
                        'tbl_detail_pengelola_teknis_bersertifikasi.thn_periode_keg',
                        'tbl_detail_pengelola_teknis_bersertifikasi.lokasi_kode',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_propinsi',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
                        'tbl_detail_pengelola_teknis_bersertifikasi.No_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Tgl_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Nama_Pejabat',
						'tbl_detail_pengelola_teknis_bersertifikasi.Jabatan',
						'tbl_detail_pengelola_teknis_bersertifikasi.Nama_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.No_KTP_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Dinas_Instansi_asal_Unit_org',
						'tbl_detail_pengelola_teknis_bersertifikasi.Alamat_lengkap_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Pendidikan_terakhir_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Jurusan_Pendidikan_terakhir',
						'tbl_detail_pengelola_teknis_bersertifikasi.Asal_Universitas',
						'tbl_detail_pengelola_teknis_bersertifikasi.Bidang_Keahlian',
						'tbl_detail_pengelola_teknis_bersertifikasi.Keterangan',
						'tbl_detail_pengelola_teknis_bersertifikasi.file_Sertifikat_pengelola_teknis',
                        'tbl_detail_pengelola_teknis_bersertifikasi.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_pengelola_teknis_bersertifikasi.thn_periode_keg',
                        'tbl_detail_pengelola_teknis_bersertifikasi.lokasi_kode',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_propinsi',
                        'tbl_detail_pengelola_teknis_bersertifikasi.nama_kabupatenkota',
                        'tbl_detail_pengelola_teknis_bersertifikasi.No_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Tgl_sertifikat_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Nama_Pejabat',
						'tbl_detail_pengelola_teknis_bersertifikasi.Jabatan',
						'tbl_detail_pengelola_teknis_bersertifikasi.Nama_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.No_KTP_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Dinas_Instansi_asal_Unit_org',
						'tbl_detail_pengelola_teknis_bersertifikasi.Alamat_lengkap_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Pendidikan_terakhir_pengelola_teknis',
						'tbl_detail_pengelola_teknis_bersertifikasi.Jurusan_Pendidikan_terakhir',
						'tbl_detail_pengelola_teknis_bersertifikasi.Asal_Universitas',
						'tbl_detail_pengelola_teknis_bersertifikasi.Bidang_Keahlian',
						'tbl_detail_pengelola_teknis_bersertifikasi.Keterangan',
						'tbl_detail_pengelola_teknis_bersertifikasi.file_Sertifikat_pengelola_teknis',
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
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_Sertifikat_pengelola_teknis')) {
			$image = $request->file('file_Sertifikat_pengelola_teknis');
			$filename = str_slug($request->file_Sertifikat_pengelola_teknis).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_Sertifikat_pengelola_teknis = $this->basePath1.'/'.$filename;
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
        $model->No_sertifikat_pengelola_teknis = $request->input('No_sertifikat_pengelola_teknis');
$model->Tgl_sertifikat_pengelola_teknis = $request->input('Tgl_sertifikat_pengelola_teknis');
$model->Nama_Pejabat = $request->input('Nama_Pejabat');
$model->Jabatan = $request->input('Jabatan');
$model->Nama_pengelola_teknis = $request->input('Nama_pengelola_teknis');
$model->No_KTP_pengelola_teknis = $request->input('No_KTP_pengelola_teknis');
$model->Dinas_Instansi_asal_Unit_org = $request->input('Dinas_Instansi_asal_Unit_org');
$model->Alamat_lengkap_pengelola_teknis = $request->input('Alamat_lengkap_pengelola_teknis');
$model->Pendidikan_terakhir_pengelola_teknis = $request->input('Pendidikan_terakhir_pengelola_teknis');
$model->Jurusan_Pendidikan_terakhir = $request->input('Jurusan_Pendidikan_terakhir');
$model->Asal_Universitas = $request->input('Asal_Universitas');
$model->Bidang_Keahlian = $request->input('Bidang_Keahlian');
$model->Keterangan = $request->input('Keterangan');

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
        
        
		if ($request->hasFile('file_Sertifikat_pengelola_teknis')) {
			$image = $request->file('file_Sertifikat_pengelola_teknis');
			if (File::exists(public_path($model->file_Sertifikat_pengelola_teknis))) {
				File::delete(public_path($model->file_Sertifikat_pengelola_teknis));
			}
			$filename = str_slug($request->file_Sertifikat_pengelola_teknis).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_Sertifikat_pengelola_teknis = $this->basePath1.'/'.$filename;
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
        $model->No_sertifikat_pengelola_teknis = $request->input('No_sertifikat_pengelola_teknis');
$model->Tgl_sertifikat_pengelola_teknis = $request->input('Tgl_sertifikat_pengelola_teknis');
$model->Nama_Pejabat = $request->input('Nama_Pejabat');
$model->Jabatan = $request->input('Jabatan');
$model->Nama_pengelola_teknis = $request->input('Nama_pengelola_teknis');
$model->No_KTP_pengelola_teknis = $request->input('No_KTP_pengelola_teknis');
$model->Dinas_Instansi_asal_Unit_org = $request->input('Dinas_Instansi_asal_Unit_org');
$model->Alamat_lengkap_pengelola_teknis = $request->input('Alamat_lengkap_pengelola_teknis');
$model->Pendidikan_terakhir_pengelola_teknis = $request->input('Pendidikan_terakhir_pengelola_teknis');
$model->Jurusan_Pendidikan_terakhir = $request->input('Jurusan_Pendidikan_terakhir');
$model->Asal_Universitas = $request->input('Asal_Universitas');
$model->Bidang_Keahlian = $request->input('Bidang_Keahlian');
$model->Keterangan = $request->input('Keterangan');

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