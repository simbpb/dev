<?php
namespace App\Models\Detail\PeraturanNasional;

use DB;
use File;
use App\Helpers\Location;

class PeraturanNasionalRepository
{

    protected $model;
    protected $basePath1 = '/files/details/peraturan-nasional/file-upload';

      
    public function __construct(PeraturanNasional $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_peraturan_nasional.id',
                        'tbl_detail_peraturan_nasional.detail_kdprog_id',
                        'tbl_detail_peraturan_nasional.thn_periode_keg',
                        'tbl_detail_peraturan_nasional.lokasi_kode',
                        'tbl_detail_peraturan_nasional.nama_propinsi',
                        'tbl_detail_peraturan_nasional.nama_kabupatenkota',
                        'tbl_detail_peraturan_nasional.no_peraturan_nasional',
'tbl_detail_peraturan_nasional.uraian',
'tbl_detail_peraturan_nasional.tentang',
'tbl_detail_peraturan_nasional.tempat_ditetapkan',
'tbl_detail_peraturan_nasional.tgl_ditetapkan',
'tbl_detail_peraturan_nasional.bln_ditetapkan',
'tbl_detail_peraturan_nasional.thn_ditetapkan',
'tbl_detail_peraturan_nasional.nama_pejabat_yg_menetapkan',
'tbl_detail_peraturan_nasional.file_upload'
                    )->searchOrder($request, [
                        'tbl_detail_peraturan_nasional.detail_kdprog_id',
                        'tbl_detail_peraturan_nasional.thn_periode_keg',
                        'tbl_detail_peraturan_nasional.lokasi_kode',
                        'tbl_detail_peraturan_nasional.nama_propinsi',
                        'tbl_detail_peraturan_nasional.nama_kabupatenkota',
                        'tbl_detail_peraturan_nasional.no_peraturan_nasional',
'tbl_detail_peraturan_nasional.uraian',
'tbl_detail_peraturan_nasional.tentang',
'tbl_detail_peraturan_nasional.tempat_ditetapkan',
'tbl_detail_peraturan_nasional.tgl_ditetapkan',
'tbl_detail_peraturan_nasional.bln_ditetapkan',
'tbl_detail_peraturan_nasional.thn_ditetapkan',
'tbl_detail_peraturan_nasional.nama_pejabat_yg_menetapkan',
'tbl_detail_peraturan_nasional.file_upload'
                    ])
                    ->paginate($limit);

        return (new PeraturanNasionalTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new PeraturanNasionalTransformer)->transformDetail($model);
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
        $model->no_peraturan_nasional = $request->input('no_peraturan_nasional');
$model->uraian = $request->input('uraian');
$model->tentang = $request->input('tentang');
$model->tempat_ditetapkan = $request->input('tempat_ditetapkan');
$model->tgl_ditetapkan = $request->input('tgl_ditetapkan');
$model->bln_ditetapkan = $request->input('bln_ditetapkan');
$model->thn_ditetapkan = $request->input('thn_ditetapkan');
$model->nama_pejabat_yg_menetapkan = $request->input('nama_pejabat_yg_menetapkan');

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
        $model->no_peraturan_nasional = $request->input('no_peraturan_nasional');
$model->uraian = $request->input('uraian');
$model->tentang = $request->input('tentang');
$model->tempat_ditetapkan = $request->input('tempat_ditetapkan');
$model->tgl_ditetapkan = $request->input('tgl_ditetapkan');
$model->bln_ditetapkan = $request->input('bln_ditetapkan');
$model->thn_ditetapkan = $request->input('thn_ditetapkan');
$model->nama_pejabat_yg_menetapkan = $request->input('nama_pejabat_yg_menetapkan');

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