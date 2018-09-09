<?php
namespace App\Models\Detail\AsianGames;

use DB;
use File;
use App\Helpers\Location;

class AsianGamesRepository
{

    protected $model;
    protected $basePath = '/files/details/asian-games';
      
    public function __construct(AsianGames $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_asian_games.id',
                        'tbl_detail_asian_games.lokasi_kode',
                        'tbl_detail_asian_games.thn_periode_keg',
                        'tbl_detail_asian_games.nama_propinsi',
                        'tbl_detail_asian_games.nama_kabupatenkota',
                        'tbl_detail_asian_games.nama_kegiatan'
                    )->searchOrder($request, [
                        'tbl_detail_asian_games.lokasi_kode',
                        'tbl_detail_asian_games.thn_periode_keg',
                        'tbl_detail_asian_games.nama_propinsi',
                        'tbl_detail_asian_games.nama_kabupatenkota',
                        'tbl_detail_asian_games.nama_kegiatan'
                    ])
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
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kegiatan = $request->input('nama_kegiatan');
        $model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
        $model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
        $model->rencana_keu = $request->input('rencana_keu');
        $model->rencana_fisik = $request->input('rencana_fisik');
        $model->realisasi_keu = $request->input('realisasi_keu');
        $model->realisasi_fisik = $request->input('realisasi_fisik');
        $model->mk_keu = $request->input('mk_keu');
        $model->mk_fisik = $request->input('mk_fisik');
        $model->permasalahan = $request->input('permasalahan');
        $model->tindak_lanjut = $request->input('tindak_lanjut');
        $model->dokumentasi = $request->input('dokumentasi');
        $model->detail_kdprog_id = '0';
        $model->is_actived = '00';
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
        $model->nama_kegiatan = $request->input('nama_kegiatan');
        $model->biaya_pelaksanaan_kontraktor = $request->input('biaya_pelaksanaan_kontraktor');
        $model->manajemen_konstruksi = $request->input('manajemen_konstruksi');
        $model->rencana_keu = $request->input('rencana_keu');
        $model->rencana_fisik = $request->input('rencana_fisik');
        $model->realisasi_keu = $request->input('realisasi_keu');
        $model->realisasi_fisik = $request->input('realisasi_fisik');
        $model->mk_keu = $request->input('mk_keu');
        $model->mk_fisik = $request->input('mk_fisik');
        $model->permasalahan = $request->input('permasalahan');
        $model->tindak_lanjut = $request->input('tindak_lanjut');
        $model->dokumentasi = $request->input('dokumentasi');
        $model->detail_kdprog_id = '0';
        $model->is_actived = '00';
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