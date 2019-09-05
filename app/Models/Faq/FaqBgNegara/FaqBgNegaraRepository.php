<?php
namespace App\Models\Faq\FaqBgNegara;

use DB;
use File;

class FaqBgNegaraRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-bg-negara/dokumentasi';

      
    public function __construct(
        FaqBgNegara $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_bg_negara.id',
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqBgNegaraTransformer)->transformPaginate($model);
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
        
        
		if ($request->hasFile('dokumentasi')) {
			$image = $request->file('dokumentasi');
			if (File::exists(public_path($model->dokumentasi))) {
				File::delete(public_path($model->dokumentasi));
			}
			$filename = str_slug($request->dokumentasi).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->dokumentasi = $this->basePath1.'/'.$filename;
		}

        $model->bg_negara_id = $request->input('bg_negara_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->nama_bg_negara = $request->input('nama_bg_negara');
		$model->instansi_pemilik_bg_negara = $request->input('instansi_pemilik_bg_negara');
		$model->alamat_bg_negara = $request->input('alamat_bg_negara');
		$model->luas_bg_negara_m2 = $request->input('luas_bg_negara_m2');
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
                        'faq_bg_negara.id',
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    )->searchOrder($request, [
                        'faq_bg_negara.bg_negara_id',
						'faq_bg_negara.info_wilayah_id',
						'faq_bg_negara.detail_kdprog_id',
						'faq_bg_negara.thn_periode_keg',
						'faq_bg_negara.lokasi_kode',
						'faq_bg_negara.nama_propinsi',
						'faq_bg_negara.nama_kabupatenkota',
						'faq_bg_negara.kd_struktur',
						'faq_bg_negara.nama_bg_negara',
						'faq_bg_negara.instansi_pemilik_bg_negara',
						'faq_bg_negara.alamat_bg_negara',
						'faq_bg_negara.luas_bg_negara_m2',
						'faq_bg_negara.titik_koordinat_lat',
						'faq_bg_negara.titik_koordinat_long',
						'faq_bg_negara.dokumentasi',
						'faq_bg_negara.tgl_input_wilayah',
						'faq_bg_negara.info_wilayah_sk',
						'faq_bg_negara.last_update',
                        'faq_bg_negara.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqBgNegaraTransformer)->transformPaginate($model);
    }
}