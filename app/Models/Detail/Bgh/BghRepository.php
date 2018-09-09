<?php
namespace App\Models\Detail\Bgh;

use DB;
use File;
use App\Helpers\Location;

class BghRepository
{

    protected $model;
    protected $basePath1 = '/files/details/bgh/file-upload-sertifikat-bgh';
protected $basePath2 = '/files/details/bgh/file-upload-sertifikat-pemanfaatan-bgh';

      
    public function __construct(Bgh $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bgh.id',
                        'tbl_detail_bgh.detail_kdprog_id',
                        'tbl_detail_bgh.thn_periode_keg',
                        'tbl_detail_bgh.lokasi_kode',
                        'tbl_detail_bgh.nama_propinsi',
                        'tbl_detail_bgh.nama_kabupatenkota',
                        'tbl_detail_bgh.nama_kepala_dinas',
'tbl_detail_bgh.nama_pengelola',
'tbl_detail_bgh.nama_penyedia_jasa_perencanaan',
'tbl_detail_bgh.thn_penerbitan_sertifikat_bgh',
'tbl_detail_bgh.no_sertifikat_bgh',
'tbl_detail_bgh.file_upload_sertifikat_bgh',
'tbl_detail_bgh.no_plakat_bgh',
'tbl_detail_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
'tbl_detail_bgh.file_upload_sertifikat_pemanfaatan_bgh',
'tbl_detail_bgh.peringkat_bgh',
'tbl_detail_bgh.pemanfaatan_ke'
                    )->searchOrder($request, [
                        'tbl_detail_bgh.detail_kdprog_id',
                        'tbl_detail_bgh.thn_periode_keg',
                        'tbl_detail_bgh.lokasi_kode',
                        'tbl_detail_bgh.nama_propinsi',
                        'tbl_detail_bgh.nama_kabupatenkota',
                        'tbl_detail_bgh.nama_kepala_dinas',
'tbl_detail_bgh.nama_pengelola',
'tbl_detail_bgh.nama_penyedia_jasa_perencanaan',
'tbl_detail_bgh.thn_penerbitan_sertifikat_bgh',
'tbl_detail_bgh.no_sertifikat_bgh',
'tbl_detail_bgh.file_upload_sertifikat_bgh',
'tbl_detail_bgh.no_plakat_bgh',
'tbl_detail_bgh.thn_penerbitan_sertifikat_pemanfaatan_bgh',
'tbl_detail_bgh.file_upload_sertifikat_pemanfaatan_bgh',
'tbl_detail_bgh.peringkat_bgh',
'tbl_detail_bgh.pemanfaatan_ke'
                    ])
                    ->paginate($limit);

        return (new BghTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BghTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
                    if ($request->hasFile('file_upload_sertifikat_bgh')) {
                        $image = $request->file('file_upload_sertifikat_bgh');
                        $filename = str_slug($request->file_upload_sertifikat_bgh).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sertifikat_bgh = $this->basePath1.'/'.$filename;
                    }

                    if ($request->hasFile('file_upload_sertifikat_pemanfaatan_bgh')) {
                        $image = $request->file('file_upload_sertifikat_pemanfaatan_bgh');
                        $filename = str_slug($request->file_upload_sertifikat_pemanfaatan_bgh).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath2);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sertifikat_pemanfaatan_bgh = $this->basePath2.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kepala_dinas = $request->input('nama_kepala_dinas');
$model->nama_pengelola = $request->input('nama_pengelola');
$model->nama_penyedia_jasa_perencanaan = $request->input('nama_penyedia_jasa_perencanaan');
$model->thn_penerbitan_sertifikat_bgh = $request->input('thn_penerbitan_sertifikat_bgh');
$model->no_sertifikat_bgh = $request->input('no_sertifikat_bgh');
$model->no_plakat_bgh = $request->input('no_plakat_bgh');
$model->thn_penerbitan_sertifikat_pemanfaatan_bgh = $request->input('thn_penerbitan_sertifikat_pemanfaatan_bgh');
$model->peringkat_bgh = $request->input('peringkat_bgh');
$model->pemanfaatan_ke = $request->input('pemanfaatan_ke');
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
        
        
                    if ($request->hasFile('file_upload_sertifikat_bgh')) {
                        $image = $request->file('file_upload_sertifikat_bgh');
                        if (File::exists(public_path($model->file_upload_sertifikat_bgh))) {
                            File::delete(public_path($model->file_upload_sertifikat_bgh));
                        }
                        $filename = str_slug($request->file_upload_sertifikat_bgh).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sertifikat_bgh = $this->basePath1.'/'.$filename;
                    }

                    if ($request->hasFile('file_upload_sertifikat_pemanfaatan_bgh')) {
                        $image = $request->file('file_upload_sertifikat_pemanfaatan_bgh');
                        if (File::exists(public_path($model->file_upload_sertifikat_pemanfaatan_bgh))) {
                            File::delete(public_path($model->file_upload_sertifikat_pemanfaatan_bgh));
                        }
                        $filename = str_slug($request->file_upload_sertifikat_pemanfaatan_bgh).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath2);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sertifikat_pemanfaatan_bgh = $this->basePath2.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kepala_dinas = $request->input('nama_kepala_dinas');
$model->nama_pengelola = $request->input('nama_pengelola');
$model->nama_penyedia_jasa_perencanaan = $request->input('nama_penyedia_jasa_perencanaan');
$model->thn_penerbitan_sertifikat_bgh = $request->input('thn_penerbitan_sertifikat_bgh');
$model->no_sertifikat_bgh = $request->input('no_sertifikat_bgh');
$model->no_plakat_bgh = $request->input('no_plakat_bgh');
$model->thn_penerbitan_sertifikat_pemanfaatan_bgh = $request->input('thn_penerbitan_sertifikat_pemanfaatan_bgh');
$model->peringkat_bgh = $request->input('peringkat_bgh');
$model->pemanfaatan_ke = $request->input('pemanfaatan_ke');
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