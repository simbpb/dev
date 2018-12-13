<?php
namespace App\Models\Detail\Tabg;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class TabgRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/tabg/file-sk-tabg';

      
    public function __construct(
        Tabg $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_tabg.id',
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.no_sk_tabg',
						'tbl_detail_tabg.tgl_sk_tabg',
						'tbl_detail_tabg.nama_pejabat',
						'tbl_detail_tabg.jabatan',
						'tbl_detail_tabg.nama_tabg',
						'tbl_detail_tabg.no_ktp_tabg',
						'tbl_detail_tabg.alamat_tabg',
						'tbl_detail_tabg.pendidikan_terakhir_tabg',
						'tbl_detail_tabg.jurusan_pendidikan_terakhir',
						'tbl_detail_tabg.asal_universitas',
						'tbl_detail_tabg.bidang_keahlian',
						'tbl_detail_tabg.jabatan_dalam_tim',
						'tbl_detail_tabg.keterangan',
						'tbl_detail_tabg.file_sk_tabg',
                        'tbl_detail_tabg.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.no_sk_tabg',
						'tbl_detail_tabg.tgl_sk_tabg',
						'tbl_detail_tabg.nama_pejabat',
						'tbl_detail_tabg.jabatan',
						'tbl_detail_tabg.nama_tabg',
						'tbl_detail_tabg.no_ktp_tabg',
						'tbl_detail_tabg.alamat_tabg',
						'tbl_detail_tabg.pendidikan_terakhir_tabg',
						'tbl_detail_tabg.jurusan_pendidikan_terakhir',
						'tbl_detail_tabg.asal_universitas',
						'tbl_detail_tabg.bidang_keahlian',
						'tbl_detail_tabg.jabatan_dalam_tim',
						'tbl_detail_tabg.keterangan',
						'tbl_detail_tabg.file_sk_tabg',
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
        $model = $this->model;

        
		if ($request->hasFile('file_sk_tabg')) {
			$image = $request->file('file_sk_tabg');
			$filename = str_slug($request->file_sk_tabg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sk_tabg = $request->input('no_sk_tabg');
		$model->tgl_sk_tabg = $request->input('tgl_sk_tabg');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg = $request->input('nama_tabg');
		$model->no_ktp_tabg = $request->input('no_ktp_tabg');
		$model->alamat_tabg = $request->input('alamat_tabg');
		$model->pendidikan_terakhir_tabg = $request->input('pendidikan_terakhir_tabg');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		$model->bidang_keahlian = $request->input('bidang_keahlian');
		$model->jabatan_dalam_tim = $request->input('jabatan_dalam_tim');
		$model->keterangan = $request->input('keterangan');
		
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
        
        
		if ($request->hasFile('file_sk_tabg')) {
			$image = $request->file('file_sk_tabg');
			if (File::exists(public_path($model->file_sk_tabg))) {
				File::delete(public_path($model->file_sk_tabg));
			}
			$filename = str_slug($request->file_sk_tabg).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sk_tabg = $request->input('no_sk_tabg');
		$model->tgl_sk_tabg = $request->input('tgl_sk_tabg');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg = $request->input('nama_tabg');
		$model->no_ktp_tabg = $request->input('no_ktp_tabg');
		$model->alamat_tabg = $request->input('alamat_tabg');
		$model->pendidikan_terakhir_tabg = $request->input('pendidikan_terakhir_tabg');
		$model->jurusan_pendidikan_terakhir = $request->input('jurusan_pendidikan_terakhir');
		$model->asal_universitas = $request->input('asal_universitas');
		$model->bidang_keahlian = $request->input('bidang_keahlian');
		$model->jabatan_dalam_tim = $request->input('jabatan_dalam_tim');
		$model->keterangan = $request->input('keterangan');
		
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