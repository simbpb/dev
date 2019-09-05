<?php
namespace App\Models\Detail\BgUmum;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class BgUmumRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/bg-umum/file-imb';
protected $basePath2 = '/files/details/bg-umum/file-slf';

      
    public function __construct(
        BgUmum $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bg_umum.id',
                        'tbl_detail_bg_umum.thn_periode_keg',
                        'tbl_detail_bg_umum.nama_propinsi',
                        'tbl_detail_bg_umum.nama_kabupatenkota',
                        'tbl_detail_bg_umum.nama_kecamatan',
						'tbl_detail_bg_umum.nama_kelurahan',
						'tbl_detail_bg_umum.rt',
						'tbl_detail_bg_umum.rw',
						'tbl_detail_bg_umum.no_rumah',
						'tbl_detail_bg_umum.nama_pemilik_bangunan',
						'tbl_detail_bg_umum.no_ktp_pemilik_bangunan',
						'tbl_detail_bg_umum.alamat_bangunan',
						'tbl_detail_bg_umum.fungsi_bangunan',
						'tbl_detail_bg_umum.memiliki_imb',
						'tbl_detail_bg_umum.no_imb',
						'tbl_detail_bg_umum.file_imb',
						'tbl_detail_bg_umum.memiliki_slf',
						'tbl_detail_bg_umum.no_slf',
						'tbl_detail_bg_umum.file_slf',
						'tbl_detail_bg_umum.tingkat_kompleksitas',
						'tbl_detail_bg_umum.tingkat_permanensi',
						'tbl_detail_bg_umum.tingkat_risiko_kebakaran',
						'tbl_detail_bg_umum.zona_gempa',
						'tbl_detail_bg_umum.kategori_lokasi',
						'tbl_detail_bg_umum.kategori_ketinggian',
						'tbl_detail_bg_umum.kepemilikan',
						'tbl_detail_bg_umum.titik_koordinat_lat',
						'tbl_detail_bg_umum.titik_koordinat_long',
                        'tbl_detail_bg_umum.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_bg_umum.thn_periode_keg',
                        'tbl_detail_bg_umum.nama_propinsi',
                        'tbl_detail_bg_umum.nama_kabupatenkota',
                        'tbl_detail_bg_umum.nama_kecamatan',
						'tbl_detail_bg_umum.nama_kelurahan',
						'tbl_detail_bg_umum.rt',
						'tbl_detail_bg_umum.rw',
						'tbl_detail_bg_umum.no_rumah',
						'tbl_detail_bg_umum.nama_pemilik_bangunan',
						'tbl_detail_bg_umum.no_ktp_pemilik_bangunan',
						'tbl_detail_bg_umum.alamat_bangunan',
						'tbl_detail_bg_umum.fungsi_bangunan',
						'tbl_detail_bg_umum.memiliki_imb',
						'tbl_detail_bg_umum.no_imb',
						'tbl_detail_bg_umum.file_imb',
						'tbl_detail_bg_umum.memiliki_slf',
						'tbl_detail_bg_umum.no_slf',
						'tbl_detail_bg_umum.file_slf',
						'tbl_detail_bg_umum.tingkat_kompleksitas',
						'tbl_detail_bg_umum.tingkat_permanensi',
						'tbl_detail_bg_umum.tingkat_risiko_kebakaran',
						'tbl_detail_bg_umum.zona_gempa',
						'tbl_detail_bg_umum.kategori_lokasi',
						'tbl_detail_bg_umum.kategori_ketinggian',
						'tbl_detail_bg_umum.kepemilikan',
						'tbl_detail_bg_umum.titik_koordinat_lat',
						'tbl_detail_bg_umum.titik_koordinat_long',
                        'tbl_detail_bg_umum.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new BgUmumTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BgUmumTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
		if ($request->hasFile('file_imb')) {
			$image = $request->file('file_imb');
			$filename = str_slug($request->file_imb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_imb = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_slf')) {
			$image = $request->file('file_slf');
			$filename = str_slug($request->file_slf).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_slf = $this->basePath2.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->nama_kelurahan = $request->input('nama_kelurahan');
		$model->rt = $request->input('rt');
		$model->rw = $request->input('rw');
		$model->no_rumah = $request->input('no_rumah');
		$model->nama_pemilik_bangunan = $request->input('nama_pemilik_bangunan');
		$model->no_ktp_pemilik_bangunan = $request->input('no_ktp_pemilik_bangunan');
		$model->alamat_bangunan = $request->input('alamat_bangunan');
		$model->fungsi_bangunan = $request->input('fungsi_bangunan');
		$model->memiliki_imb = $request->input('memiliki_imb');
		$model->no_imb = $request->input('no_imb');
		$model->memiliki_slf = $request->input('memiliki_slf');
		$model->no_slf = $request->input('no_slf');
		$model->tingkat_kompleksitas = $request->input('tingkat_kompleksitas');
		$model->tingkat_permanensi = $request->input('tingkat_permanensi');
		$model->tingkat_risiko_kebakaran = $request->input('tingkat_risiko_kebakaran');
		$model->zona_gempa = $request->input('zona_gempa');
		$model->kategori_lokasi = $request->input('kategori_lokasi');
		$model->kategori_ketinggian = $request->input('kategori_ketinggian');
		$model->kepemilikan = $request->input('kepemilikan');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
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
        
        
		if ($request->hasFile('file_imb')) {
			$image = $request->file('file_imb');
			if (File::exists(public_path($model->file_imb))) {
				File::delete(public_path($model->file_imb));
			}
			$filename = str_slug($request->file_imb).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_imb = $this->basePath1.'/'.$filename;
		}

		if ($request->hasFile('file_slf')) {
			$image = $request->file('file_slf');
			if (File::exists(public_path($model->file_slf))) {
				File::delete(public_path($model->file_slf));
			}
			$filename = str_slug($request->file_slf).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath2);
			$image->move($destinationPath, $filename);
			$model->file_slf = $this->basePath2.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->nama_kelurahan = $request->input('nama_kelurahan');
		$model->rt = $request->input('rt');
		$model->rw = $request->input('rw');
		$model->no_rumah = $request->input('no_rumah');
		$model->nama_pemilik_bangunan = $request->input('nama_pemilik_bangunan');
		$model->no_ktp_pemilik_bangunan = $request->input('no_ktp_pemilik_bangunan');
		$model->alamat_bangunan = $request->input('alamat_bangunan');
		$model->fungsi_bangunan = $request->input('fungsi_bangunan');
		$model->memiliki_imb = $request->input('memiliki_imb');
		$model->no_imb = $request->input('no_imb');
		$model->memiliki_slf = $request->input('memiliki_slf');
		$model->no_slf = $request->input('no_slf');
		$model->tingkat_kompleksitas = $request->input('tingkat_kompleksitas');
		$model->tingkat_permanensi = $request->input('tingkat_permanensi');
		$model->tingkat_risiko_kebakaran = $request->input('tingkat_risiko_kebakaran');
		$model->zona_gempa = $request->input('zona_gempa');
		$model->kategori_lokasi = $request->input('kategori_lokasi');
		$model->kategori_ketinggian = $request->input('kategori_ketinggian');
		$model->kepemilikan = $request->input('kepemilikan');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
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