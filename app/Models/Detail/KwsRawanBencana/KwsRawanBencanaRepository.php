<?php
namespace App\Models\Detail\KwsRawanBencana;

use DB;
use File;
use App\Helpers\Location;

class KwsRawanBencanaRepository
{

    protected $model;
    protected $basePath = '/files/details/kws-rawan-bencana';
      
    public function __construct(KwsRawanBencana $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kws_rawan_bencana.id',
                        'tbl_detail_kws_rawan_bencana.lokasi_kode',
                        'tbl_detail_kws_rawan_bencana.thn_periode_keg',
                        'tbl_detail_kws_rawan_bencana.nama_propinsi',
                        'tbl_detail_kws_rawan_bencana.nama_kabupatenkota',
                        'tbl_detail_kws_rawan_bencana.indeks_resiko',
                        'tbl_detail_kws_rawan_bencana.tingkat_resiko',
                        'tbl_detail_kws_rawan_bencana.struktur_ruang'
                    )->searchOrder($request, [
                        'tbl_detail_kws_rawan_bencana.lokasi_kode',
                        'tbl_detail_kws_rawan_bencana.thn_periode_keg',
                        'tbl_detail_kws_rawan_bencana.nama_propinsi',
                        'tbl_detail_kws_rawan_bencana.nama_kabupatenkota',
                        'tbl_detail_kws_rawan_bencana.indeks_resiko',
                        'tbl_detail_kws_rawan_bencana.tingkat_resiko',
                        'tbl_detail_kws_rawan_bencana.struktur_ruang'
                    ])
                    ->paginate($limit);

        return (new KwsRawanBencanaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KwsRawanBencanaTransformer)->transformDetail($model);
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
        $model->indeks_resiko = $request->input('indeks_resiko');
        $model->tingkat_resiko = $request->input('tingkat_resiko');
        $model->struktur_ruang = $request->input('struktur_ruang');
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
        $model->indeks_resiko = $request->input('indeks_resiko');
        $model->tingkat_resiko = $request->input('tingkat_resiko');
        $model->struktur_ruang = $request->input('struktur_ruang');
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