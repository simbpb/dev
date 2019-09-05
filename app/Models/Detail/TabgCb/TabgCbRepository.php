<?php
namespace App\Models\Detail\TabgCb;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class TabgCbRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/tabg-cb/file-sk-tabg-cb';

      
    public function __construct(
        TabgCb $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_tabg_cb.id',
                        'tbl_detail_tabg_cb.thn_periode_keg',
                        'tbl_detail_tabg_cb.nama_propinsi',
                        'tbl_detail_tabg_cb.nama_kabupatenkota',
                        'tbl_detail_tabg_cb.no_sk_tabg_cb',
						'tbl_detail_tabg_cb.tgl_sk_tabg_cb',
						'tbl_detail_tabg_cb.nama_pejabat',
						'tbl_detail_tabg_cb.jabatan',
						'tbl_detail_tabg_cb.nama_tabg_cb',
						'tbl_detail_tabg_cb.no_ktp_tabg_cb',
						'tbl_detail_tabg_cb.alamat_tabg_cb',
						'tbl_detail_tabg_cb.pendidikan_terakhir_tabg_cb',
						'tbl_detail_tabg_cb.jurusan_pendidikan_terakhir',
						'tbl_detail_tabg_cb.asal_universitas',
						'tbl_detail_tabg_cb.bidang_keahlian',
						'tbl_detail_tabg_cb.jabatan_dalam_tim',
						'tbl_detail_tabg_cb.keterangan',
						'tbl_detail_tabg_cb.file_sk_tabg_cb',
                        'tbl_detail_tabg_cb.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_tabg_cb.thn_periode_keg',
                        'tbl_detail_tabg_cb.nama_propinsi',
                        'tbl_detail_tabg_cb.nama_kabupatenkota',
                        'tbl_detail_tabg_cb.no_sk_tabg_cb',
						'tbl_detail_tabg_cb.tgl_sk_tabg_cb',
						'tbl_detail_tabg_cb.nama_pejabat',
						'tbl_detail_tabg_cb.jabatan',
						'tbl_detail_tabg_cb.nama_tabg_cb',
						'tbl_detail_tabg_cb.no_ktp_tabg_cb',
						'tbl_detail_tabg_cb.alamat_tabg_cb',
						'tbl_detail_tabg_cb.pendidikan_terakhir_tabg_cb',
						'tbl_detail_tabg_cb.jurusan_pendidikan_terakhir',
						'tbl_detail_tabg_cb.asal_universitas',
						'tbl_detail_tabg_cb.bidang_keahlian',
						'tbl_detail_tabg_cb.jabatan_dalam_tim',
						'tbl_detail_tabg_cb.keterangan',
						'tbl_detail_tabg_cb.file_sk_tabg_cb',
                        'tbl_detail_tabg_cb.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new TabgCbTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new TabgCbTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_sk_tabg_cb')) {
			$image = $request->file('file_sk_tabg_cb');
			$filename = str_slug($request->file_sk_tabg_cb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg_cb = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sk_tabg_cb = $request->input('no_sk_tabg_cb');
		$model->tgl_sk_tabg_cb = $request->input('tgl_sk_tabg_cb');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg_cb = $request->input('nama_tabg_cb');
		$model->no_ktp_tabg_cb = $request->input('no_ktp_tabg_cb');
		$model->alamat_tabg_cb = $request->input('alamat_tabg_cb');
		$model->pendidikan_terakhir_tabg_cb = $request->input('pendidikan_terakhir_tabg_cb');
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
        
        
		if ($request->hasFile('file_sk_tabg_cb')) {
			$image = $request->file('file_sk_tabg_cb');
			if (File::exists(public_path($model->file_sk_tabg_cb))) {
				File::delete(public_path($model->file_sk_tabg_cb));
			}
			$filename = str_slug($request->file_sk_tabg_cb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_tabg_cb = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_sk_tabg_cb = $request->input('no_sk_tabg_cb');
		$model->tgl_sk_tabg_cb = $request->input('tgl_sk_tabg_cb');
		$model->nama_pejabat = $request->input('nama_pejabat');
		$model->jabatan = $request->input('jabatan');
		$model->nama_tabg_cb = $request->input('nama_tabg_cb');
		$model->no_ktp_tabg_cb = $request->input('no_ktp_tabg_cb');
		$model->alamat_tabg_cb = $request->input('alamat_tabg_cb');
		$model->pendidikan_terakhir_tabg_cb = $request->input('pendidikan_terakhir_tabg_cb');
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