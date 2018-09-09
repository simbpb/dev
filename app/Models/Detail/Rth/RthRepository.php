<?php
namespace App\Models\Detail\Rth;

use DB;
use File;
use App\Helpers\Location;

class RthRepository
{

    protected $model;
    
      
    public function __construct(Rth $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rth.id',
                        'tbl_detail_rth.detail_kdprog_id',
                        'tbl_detail_rth.thn_periode_keg',
                        'tbl_detail_rth.lokasi_kode',
                        'tbl_detail_rth.nama_propinsi',
                        'tbl_detail_rth.nama_kabupatenkota',
                        'tbl_detail_rth.nama_kecamatan',
'tbl_detail_rth.nama_kegiatan_rth'
                    )->searchOrder($request, [
                        'tbl_detail_rth.detail_kdprog_id',
                        'tbl_detail_rth.thn_periode_keg',
                        'tbl_detail_rth.lokasi_kode',
                        'tbl_detail_rth.nama_propinsi',
                        'tbl_detail_rth.nama_kabupatenkota',
                        'tbl_detail_rth.nama_kecamatan',
'tbl_detail_rth.nama_kegiatan_rth'
                    ])
                    ->paginate($limit);

        return (new RthTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RthTransformer)->transformDetail($model);
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
        $model->nama_kecamatan = $request->input('nama_kecamatan');
$model->nama_kegiatan_rth = $request->input('nama_kegiatan_rth');
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
        $model->nama_kecamatan = $request->input('nama_kecamatan');
$model->nama_kegiatan_rth = $request->input('nama_kegiatan_rth');
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