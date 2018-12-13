<?php
namespace App\Models\Detail\RthStatusTigapuluhpersen;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class RthStatusTigapuluhpersenRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        RthStatusTigapuluhpersen $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rth_status_tigapuluhpersen.id',
                        'tbl_detail_rth_status_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_status_tigapuluhpersen.luas_wilayah',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'tbl_detail_rth_status_tigapuluhpersen.jenis_rth',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset',
                        'tbl_detail_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_rth_status_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_status_tigapuluhpersen.luas_wilayah',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_wilayah',
						'tbl_detail_rth_status_tigapuluhpersen.jenis_rth',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset',
                        'tbl_detail_rth_status_tigapuluhpersen.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new RthStatusTigapuluhpersenTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RthStatusTigapuluhpersenTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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
        
        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
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