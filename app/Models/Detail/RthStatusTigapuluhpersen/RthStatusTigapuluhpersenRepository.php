<?php
namespace App\Models\Detail\RthStatusTigapuluhpersen;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class RthStatusTigapuluhpersenRepository
{

    protected $model;
    protected $program;
    
      
    public function __construct(
        RthStatusTigapuluhpersen $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rth_status_tigapuluhpersen.id',
                        'tbl_detail_rth_status_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_status_tigapuluhpersen.lokasi_kode',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_status_tigapuluhpersen.luas_wilayah_kab_kota',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_wilayah_kab_kota',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan_private',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan_private',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset_private',
                        'tbl_detail_rth_status_tigapuluhpersen.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_rth_status_tigapuluhpersen.thn_periode_keg',
                        'tbl_detail_rth_status_tigapuluhpersen.lokasi_kode',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_propinsi',
                        'tbl_detail_rth_status_tigapuluhpersen.nama_kabupatenkota',
                        'tbl_detail_rth_status_tigapuluhpersen.luas_wilayah_kab_kota',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_wilayah_kab_kota',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset',
						'tbl_detail_rth_status_tigapuluhpersen.bentuk_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.nama_kawasan_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.lokasi_kawasan_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_lat_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.titik_koordinat_long_rth_private',
						'tbl_detail_rth_status_tigapuluhpersen.luas_kawasan_private',
						'tbl_detail_rth_status_tigapuluhpersen.satuan_luas_kawasan_private',
						'tbl_detail_rth_status_tigapuluhpersen.status_aset_private',
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
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        

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
        $model->luas_wilayah_kab_kota = $request->input('luas_wilayah_kab_kota');
$model->satuan_luas_wilayah_kab_kota = $request->input('satuan_luas_wilayah_kab_kota');
$model->bentuk_rth = $request->input('bentuk_rth');
$model->nama_kawasan = $request->input('nama_kawasan');
$model->lokasi_kawasan = $request->input('lokasi_kawasan');
$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
$model->titik_koordinat_long = $request->input('titik_koordinat_long');
$model->luas_kawasan = $request->input('luas_kawasan');
$model->satuan_luas_kawasan = $request->input('satuan_luas_kawasan');
$model->status_aset = $request->input('status_aset');
$model->bentuk_rth_private = $request->input('bentuk_rth_private');
$model->nama_kawasan_rth_private = $request->input('nama_kawasan_rth_private');
$model->lokasi_kawasan_rth_private = $request->input('lokasi_kawasan_rth_private');
$model->titik_koordinat_lat_rth_private = $request->input('titik_koordinat_lat_rth_private');
$model->titik_koordinat_long_rth_private = $request->input('titik_koordinat_long_rth_private');
$model->luas_kawasan_private = $request->input('luas_kawasan_private');
$model->satuan_luas_kawasan_private = $request->input('satuan_luas_kawasan_private');
$model->status_aset_private = $request->input('status_aset_private');
        $model->is_actived = 'ACTIVE';
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
        $model->luas_wilayah_kab_kota = $request->input('luas_wilayah_kab_kota');
$model->satuan_luas_wilayah_kab_kota = $request->input('satuan_luas_wilayah_kab_kota');
$model->bentuk_rth = $request->input('bentuk_rth');
$model->nama_kawasan = $request->input('nama_kawasan');
$model->lokasi_kawasan = $request->input('lokasi_kawasan');
$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
$model->titik_koordinat_long = $request->input('titik_koordinat_long');
$model->luas_kawasan = $request->input('luas_kawasan');
$model->satuan_luas_kawasan = $request->input('satuan_luas_kawasan');
$model->status_aset = $request->input('status_aset');
$model->bentuk_rth_private = $request->input('bentuk_rth_private');
$model->nama_kawasan_rth_private = $request->input('nama_kawasan_rth_private');
$model->lokasi_kawasan_rth_private = $request->input('lokasi_kawasan_rth_private');
$model->titik_koordinat_lat_rth_private = $request->input('titik_koordinat_lat_rth_private');
$model->titik_koordinat_long_rth_private = $request->input('titik_koordinat_long_rth_private');
$model->luas_kawasan_private = $request->input('luas_kawasan_private');
$model->satuan_luas_kawasan_private = $request->input('satuan_luas_kawasan_private');
$model->status_aset_private = $request->input('status_aset_private');
        $model->is_actived = 'ACTIVE';
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