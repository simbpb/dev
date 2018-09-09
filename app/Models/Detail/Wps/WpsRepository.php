<?php
namespace App\Models\Detail\Wps;

use DB;
use File;
use App\Helpers\Location;

class WpsRepository
{

    protected $model;
    protected $basePath1 = '/files/details/wps/file-upload';

      
    public function __construct(Wps $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_wps.id',
                        'tbl_detail_wps.detail_kdprog_id',
                        'tbl_detail_wps.thn_periode_keg',
                        'tbl_detail_wps.lokasi_kode',
                        'tbl_detail_wps.nama_kabupatenkota',
                        'tbl_detail_wps.nama_wps'
                    )->searchOrder($request, [
                        'tbl_detail_wps.detail_kdprog_id',
                        'tbl_detail_wps.thn_periode_keg',
                        'tbl_detail_wps.lokasi_kode',
                        'tbl_detail_wps.nama_kabupatenkota',
                        'tbl_detail_wps.nama_wps'
                    ])
                    ->paginate($limit);

        return (new WpsTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new WpsTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
                    if ($request->hasFile('file_upload')) {
                        $image = $request->file('file_upload');
                        $filename = str_slug($request->file_upload).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_wps = $request->input('nama_wps');

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
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_wps = $request->input('nama_wps');

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