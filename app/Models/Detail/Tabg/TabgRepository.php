<?php
namespace App\Models\Detail\Tabg;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class TabgRepository
{

    protected $model;
    protected $program;
    protected $basePath1 = '/files/details/tabg/file-SK-TABG';

      
    public function __construct(
        Tabg $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_tabg.id',
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.lokasi_kode',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.No_sk_TABG',
						'tbl_detail_tabg.Tgl_sk_TABG',
						'tbl_detail_tabg.Nama_Pejabat',
						'tbl_detail_tabg.Jabatan',
						'tbl_detail_tabg.Nama_TABG',
						'tbl_detail_tabg.No_KTP_TABG',
						'tbl_detail_tabg.Alamat_lengkap_TABG',
						'tbl_detail_tabg.Pendidikan_terakhir_TABG',
						'tbl_detail_tabg.Jurusan_Pendidikan_terakhir',
						'tbl_detail_tabg.Asal_Universitas',
						'tbl_detail_tabg.Bidang_Keahlian',
						'tbl_detail_tabg.Jabatan_dalam_tim',
						'tbl_detail_tabg.Keterangan',
						'tbl_detail_tabg.file_SK_TABG',
                        'tbl_detail_tabg.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.lokasi_kode',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.No_sk_TABG',
						'tbl_detail_tabg.Tgl_sk_TABG',
						'tbl_detail_tabg.Nama_Pejabat',
						'tbl_detail_tabg.Jabatan',
						'tbl_detail_tabg.Nama_TABG',
						'tbl_detail_tabg.No_KTP_TABG',
						'tbl_detail_tabg.Alamat_lengkap_TABG',
						'tbl_detail_tabg.Pendidikan_terakhir_TABG',
						'tbl_detail_tabg.Jurusan_Pendidikan_terakhir',
						'tbl_detail_tabg.Asal_Universitas',
						'tbl_detail_tabg.Bidang_Keahlian',
						'tbl_detail_tabg.Jabatan_dalam_tim',
						'tbl_detail_tabg.Keterangan',
						'tbl_detail_tabg.file_SK_TABG',
                        'tbl_detail_tabg.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new TabgTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new TabgTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_SK_TABG')) {
			$image = $request->file('file_SK_TABG');
			$filename = str_slug($request->file_SK_TABG).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_SK_TABG = $this->basePath1.'/'.$filename;
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
        $model->No_sk_TABG = $request->input('No_sk_TABG');
$model->Tgl_sk_TABG = $request->input('Tgl_sk_TABG');
$model->Nama_Pejabat = $request->input('Nama_Pejabat');
$model->Jabatan = $request->input('Jabatan');
$model->Nama_TABG = $request->input('Nama_TABG');
$model->No_KTP_TABG = $request->input('No_KTP_TABG');
$model->Alamat_lengkap_TABG = $request->input('Alamat_lengkap_TABG');
$model->Pendidikan_terakhir_TABG = $request->input('Pendidikan_terakhir_TABG');
$model->Jurusan_Pendidikan_terakhir = $request->input('Jurusan_Pendidikan_terakhir');
$model->Asal_Universitas = $request->input('Asal_Universitas');
$model->Bidang_Keahlian = $request->input('Bidang_Keahlian');
$model->Jabatan_dalam_tim = $request->input('Jabatan_dalam_tim');
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
        
        
		if ($request->hasFile('file_SK_TABG')) {
			$image = $request->file('file_SK_TABG');
			if (File::exists(public_path($model->file_SK_TABG))) {
				File::delete(public_path($model->file_SK_TABG));
			}
			$filename = str_slug($request->file_SK_TABG).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_SK_TABG = $this->basePath1.'/'.$filename;
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
        $model->No_sk_TABG = $request->input('No_sk_TABG');
$model->Tgl_sk_TABG = $request->input('Tgl_sk_TABG');
$model->Nama_Pejabat = $request->input('Nama_Pejabat');
$model->Jabatan = $request->input('Jabatan');
$model->Nama_TABG = $request->input('Nama_TABG');
$model->No_KTP_TABG = $request->input('No_KTP_TABG');
$model->Alamat_lengkap_TABG = $request->input('Alamat_lengkap_TABG');
$model->Pendidikan_terakhir_TABG = $request->input('Pendidikan_terakhir_TABG');
$model->Jurusan_Pendidikan_terakhir = $request->input('Jurusan_Pendidikan_terakhir');
$model->Asal_Universitas = $request->input('Asal_Universitas');
$model->Bidang_Keahlian = $request->input('Bidang_Keahlian');
$model->Jabatan_dalam_tim = $request->input('Jabatan_dalam_tim');
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