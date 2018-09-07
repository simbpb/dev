<?php
namespace App\Models\Detail\P2kh;

use DB;
use File;
use App\Helpers\Location;

class P2khRepository
{

    protected $model;
    protected $basePath = '/files/details/p2kh';
      
    public function __construct(P2kh $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_p2kh.id',
                        'tbl_detail_p2kh.lokasi_kode',
                        'tbl_detail_p2kh.thn_periode_keg',
                        'tbl_detail_p2kh.nama_propinsi',
                        'tbl_detail_p2kh.nama_kabupatenkota',
                        'tbl_detail_p2kh.thn_penetapan',
                        'tbl_detail_p2kh.nama_lokasi',
                        'tbl_detail_p2kh.luas_kws',
                        'tbl_detail_p2kh.satuan_luas_kws'
                    )->searchOrder($request, [
                        'tbl_detail_p2kh.lokasi_kode',
                        'tbl_detail_p2kh.thn_periode_keg',
                        'tbl_detail_p2kh.nama_propinsi',
                        'tbl_detail_p2kh.nama_kabupatenkota',
                        'tbl_detail_p2kh.thn_penetapan',
                        'tbl_detail_p2kh.nama_lokasi',
                        'tbl_detail_p2kh.luas_kws',
                        'tbl_detail_p2kh.satuan_luas_kws'
                    ])
                    ->paginate($limit);

        return (new P2khTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new P2khTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        if ($request->hasFile('file_upload')) {
           $image = $request->file('file_upload');
           $filename = str_slug($request->file_upload).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath);
           $image->move($destinationPath, $filename);
           $model->file_upload = $this->basePath.'/'.$filename;
        }
        
        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->thn_penetapan = $request->input('thn_penetapan');
        $model->nama_lokasi = $request->input('nama_lokasi');
        $model->luas_kws = $request->input('luas_kws');
        $model->satuan_luas_kws = $request->input('satuan_luas_kws');
        $model->cakupan_wilayah = $request->input('cakupan_wilayah');
        $model->uraian_karakter_lokasi = $request->input('uraian_karakter_lokasi');
        $model->tipe_dok_p2kh = $request->input('tipe_dok_p2kh');
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
        
        if ($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            if (File::exists(public_path($model->file_upload))) {
               File::delete(public_path($model->file_upload));
            }
            $filename = str_slug($request->file_upload).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath);
            $image->move($destinationPath, $filename);
            $model->file_upload = $this->basePath.'/'.$filename;
        }

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->thn_penetapan = $request->input('thn_penetapan');
        $model->nama_lokasi = $request->input('nama_lokasi');
        $model->luas_kws = $request->input('luas_kws');
        $model->satuan_luas_kws = $request->input('satuan_luas_kws');
        $model->cakupan_wilayah = $request->input('cakupan_wilayah');
        $model->uraian_karakter_lokasi = $request->input('uraian_karakter_lokasi');
        $model->tipe_dok_p2kh = $request->input('tipe_dok_p2kh');
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