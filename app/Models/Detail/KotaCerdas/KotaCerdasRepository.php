<?php
namespace App\Models\Detail\KotaCerdas;

use DB;
use File;
use App\Helpers\Location;

class KotaCerdasRepository
{

    protected $model;
    protected $basePath1 = '/files/details/kota-cerdas/file-upload';

      
    public function __construct(KotaCerdas $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kota_cerdas.id',
                        'tbl_detail_kota_cerdas.detail_kdprog_id',
                        'tbl_detail_kota_cerdas.thn_periode_keg',
                        'tbl_detail_kota_cerdas.lokasi_kode',
                        'tbl_detail_kota_cerdas.nama_propinsi',
                        'tbl_detail_kota_cerdas.nama_kabupatenkota',
                        'tbl_detail_kota_cerdas.thn_penetapan',
'tbl_detail_kota_cerdas.tipe_dok_kota_cerdas',
'tbl_detail_kota_cerdas.file_upload'
                    )->searchOrder($request, [
                        'tbl_detail_kota_cerdas.detail_kdprog_id',
                        'tbl_detail_kota_cerdas.thn_periode_keg',
                        'tbl_detail_kota_cerdas.lokasi_kode',
                        'tbl_detail_kota_cerdas.nama_propinsi',
                        'tbl_detail_kota_cerdas.nama_kabupatenkota',
                        'tbl_detail_kota_cerdas.thn_penetapan',
'tbl_detail_kota_cerdas.tipe_dok_kota_cerdas',
'tbl_detail_kota_cerdas.file_upload'
                    ])
                    ->paginate($limit);

        return (new KotaCerdasTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KotaCerdasTransformer)->transformDetail($model);
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
        $model->thn_penetapan = $request->input('thn_penetapan');
$model->tipe_dok_kota_cerdas = $request->input('tipe_dok_kota_cerdas');

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
        $model->thn_penetapan = $request->input('thn_penetapan');
$model->tipe_dok_kota_cerdas = $request->input('tipe_dok_kota_cerdas');

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