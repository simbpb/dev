<?php
namespace App\Models\Detail\KebunRaya;

use DB;
use File;
use App\Helpers\Location;

class KebunRayaRepository
{

    protected $model;
    protected $basePath = '/files/details/kebun-raya';
      
    public function __construct(KebunRaya $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kebun_raya.id',
                        'tbl_detail_kebun_raya.lokasi_kode',
                        'tbl_detail_kebun_raya.thn_periode_keg',
                        'tbl_detail_kebun_raya.nama_propinsi',
                        'tbl_detail_kebun_raya.nama_kabupatenkota',
                        'tbl_detail_kebun_raya.nama_kebun_raya',
                        'tbl_detail_kebun_raya.thn_penetapan'
                    )->searchOrder($request, [
                        'tbl_detail_kebun_raya.lokasi_kode',
                        'tbl_detail_kebun_raya.thn_periode_keg',
                        'tbl_detail_kebun_raya.nama_propinsi',
                        'tbl_detail_kebun_raya.nama_kabupatenkota',
                        'tbl_detail_kebun_raya.nama_kebun_raya',
                        'tbl_detail_kebun_raya.thn_penetapan'
                    ])
                    ->paginate($limit);

        return (new KebunRayaTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KebunRayaTransformer)->transformDetail($model);
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
        $model->nama_kebun_raya = $request->input('nama_kebun_raya');
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
        $model->nama_kebun_raya = $request->input('nama_kebun_raya');
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