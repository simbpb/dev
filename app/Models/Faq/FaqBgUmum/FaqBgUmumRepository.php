<?php
namespace App\Models\Faq\FaqBgUmum;

use DB;
use File;

class FaqBgUmumRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bg-umum/file-imb';
protected $basePath2 = '/files/faqs/faq-bg-umum/file-slf';

      
    public function __construct(
        FaqBgUmum $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_umum.id',
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBgUmumTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return $model;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
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

        $model->bg_umum_id = $request->input('bg_umum_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->nama_kelurahan = $request->input('nama_kelurahan');
		$model->kd_struktur = $request->input('kd_struktur');
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
		$model->tgl_input_wilayah = $request->input('tgl_input_wilayah');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
        
        $model->save();
        
        DB::commit();
        return true;
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_umum.id',
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_umum.bg_umum_id',
						'faq_bg_umum.info_wilayah_id',
						'faq_bg_umum.detail_kdprog_id',
						'faq_bg_umum.thn_periode_keg',
						'faq_bg_umum.lokasi_kode',
						'faq_bg_umum.nama_propinsi',
						'faq_bg_umum.nama_kabupatenkota',
						'faq_bg_umum.nama_kecamatan',
						'faq_bg_umum.nama_kelurahan',
						'faq_bg_umum.kd_struktur',
						'faq_bg_umum.rt',
						'faq_bg_umum.rw',
						'faq_bg_umum.no_rumah',
						'faq_bg_umum.nama_pemilik_bangunan',
						'faq_bg_umum.no_ktp_pemilik_bangunan',
						'faq_bg_umum.alamat_bangunan',
						'faq_bg_umum.fungsi_bangunan',
						'faq_bg_umum.memiliki_imb',
						'faq_bg_umum.no_imb',
						'faq_bg_umum.file_imb',
						'faq_bg_umum.memiliki_slf',
						'faq_bg_umum.no_slf',
						'faq_bg_umum.file_slf',
						'faq_bg_umum.tingkat_kompleksitas',
						'faq_bg_umum.tingkat_permanensi',
						'faq_bg_umum.tingkat_risiko_kebakaran',
						'faq_bg_umum.zona_gempa',
						'faq_bg_umum.kategori_lokasi',
						'faq_bg_umum.kategori_ketinggian',
						'faq_bg_umum.kepemilikan',
						'faq_bg_umum.titik_koordinat_lat',
						'faq_bg_umum.titik_koordinat_long',
						'faq_bg_umum.tgl_input_wilayah',
						'faq_bg_umum.info_wilayah_sk',
						'faq_bg_umum.last_update',
                        'faq_bg_umum.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBgUmumTransformer)->transformPaginate($model);
    }
}