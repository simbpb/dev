<?php
namespace App\Models\Detail\AsianGames;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class AsianGamesRepository
{

    protected $model;
    protected $kodifikasi;
    
      
    public function __construct(
        AsianGames $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_asian_games.id',
                        'tbl_detail_asian_games.thn_periode_keg',
                        'tbl_detail_asian_games.nama_propinsi',
                        'tbl_detail_asian_games.nama_kabupatenkota',
                        'tbl_detail_asian_games.nama_kegiatan',
						'tbl_detail_asian_games.thn_anggaran',
						'tbl_detail_asian_games.sumber_anggaran',
						'tbl_detail_asian_games.alokasi_anggaran',
						'tbl_detail_asian_games.volume_pekerjaan',
						'tbl_detail_asian_games.instansi_unit_organisasi_pelaksana',
						'tbl_detail_asian_games.lokasi_kegiatan_proyek',
						'tbl_detail_asian_games.titik_koordinat_lat',
						'tbl_detail_asian_games.titik_koordinat_long',
						'tbl_detail_asian_games.status_aset',
                        'tbl_detail_asian_games.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_asian_games.thn_periode_keg',
                        'tbl_detail_asian_games.nama_propinsi',
                        'tbl_detail_asian_games.nama_kabupatenkota',
                        'tbl_detail_asian_games.nama_kegiatan',
						'tbl_detail_asian_games.thn_anggaran',
						'tbl_detail_asian_games.sumber_anggaran',
						'tbl_detail_asian_games.alokasi_anggaran',
						'tbl_detail_asian_games.volume_pekerjaan',
						'tbl_detail_asian_games.instansi_unit_organisasi_pelaksana',
						'tbl_detail_asian_games.lokasi_kegiatan_proyek',
						'tbl_detail_asian_games.titik_koordinat_lat',
						'tbl_detail_asian_games.titik_koordinat_long',
						'tbl_detail_asian_games.status_aset',
                        'tbl_detail_asian_games.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new AsianGamesTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new AsianGamesTransformer)->transformDetail($model);
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
        $model->nama_kegiatan = $request->input('nama_kegiatan');
		$model->thn_anggaran = $request->input('thn_anggaran');
		$model->sumber_anggaran = $request->input('sumber_anggaran');
		$model->alokasi_anggaran = $request->input('alokasi_anggaran');
		$model->volume_pekerjaan = $request->input('volume_pekerjaan');
		$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
		$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
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
        $model->nama_kegiatan = $request->input('nama_kegiatan');
		$model->thn_anggaran = $request->input('thn_anggaran');
		$model->sumber_anggaran = $request->input('sumber_anggaran');
		$model->alokasi_anggaran = $request->input('alokasi_anggaran');
		$model->volume_pekerjaan = $request->input('volume_pekerjaan');
		$model->instansi_unit_organisasi_pelaksana = $request->input('instansi_unit_organisasi_pelaksana');
		$model->lokasi_kegiatan_proyek = $request->input('lokasi_kegiatan_proyek');
		$model->titik_koordinat_lat = $request->input('titik_koordinat_lat');
		$model->titik_koordinat_long = $request->input('titik_koordinat_long');
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