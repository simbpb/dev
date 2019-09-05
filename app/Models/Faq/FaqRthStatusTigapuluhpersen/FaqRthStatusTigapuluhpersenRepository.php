<?php
namespace App\Models\Faq\FaqRthStatusTigapuluhpersen;

use DB;
use File;

class FaqRthStatusTigapuluhpersenRepository
{

    protected $model;
    
      
    public function __construct(
        FaqRthStatusTigapuluhpersen $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_rth_status_tigapuluhpersen.id',
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqRthStatusTigapuluhpersenTransformer)->transformPaginate($model);
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
        
        
        $model->status_tigapuluhpersen_id = $request->input('status_tigapuluhpersen_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->luas_wilayah = $request->input('luas_wilayah');
		$model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
		$model->jenis_rth = $request->input('jenis_rth');
		$model->bentuk_rth = $request->input('bentuk_rth');
		$model->nama_kawasan = $request->input('nama_kawasan');
		$model->lokasi_kawasan = $request->input('lokasi_kawasan');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
		$model->luas_kawasan = $request->input('luas_kawasan');
		$model->satuan_luas_kawasan = $request->input('satuan_luas_kawasan');
		$model->status_aset = $request->input('status_aset');
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
                        'faq_rth_status_tigapuluhpersen.id',
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'faq_rth_status_tigapuluhpersen.status_tigapuluhpersen_id',
						'faq_rth_status_tigapuluhpersen.info_wilayah_id',
						'faq_rth_status_tigapuluhpersen.detail_kdprog_id',
						'faq_rth_status_tigapuluhpersen.thn_periode_keg',
						'faq_rth_status_tigapuluhpersen.lokasi_kode',
						'faq_rth_status_tigapuluhpersen.nama_propinsi',
						'faq_rth_status_tigapuluhpersen.nama_kabupatenkota',
						'faq_rth_status_tigapuluhpersen.kd_struktur',
						'faq_rth_status_tigapuluhpersen.luas_wilayah',
						'faq_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'faq_rth_status_tigapuluhpersen.jenis_rth',
						'faq_rth_status_tigapuluhpersen.bentuk_rth',
						'faq_rth_status_tigapuluhpersen.nama_kawasan',
						'faq_rth_status_tigapuluhpersen.lokasi_kawasan',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'faq_rth_status_tigapuluhpersen.titik_koordinat_long',
						'faq_rth_status_tigapuluhpersen.luas_kawasan',
						'faq_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'faq_rth_status_tigapuluhpersen.status_aset',
						'faq_rth_status_tigapuluhpersen.tgl_input_wilayah',
						'faq_rth_status_tigapuluhpersen.info_wilayah_sk',
						'faq_rth_status_tigapuluhpersen.last_update',
                        'faq_rth_status_tigapuluhpersen.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqRthStatusTigapuluhpersenTransformer)->transformPaginate($model);
    }
}