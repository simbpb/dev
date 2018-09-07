<?php
namespace App\Models\Detail\Kspn;

use DB;
use File;
use App\Helpers\Location;

class KspnRepository
{

    protected $model;
    protected $basePath = '/files/details/kspn';
      
    public function __construct(Kspn $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kspn.id',
                        'tbl_detail_kspn.lokasi_kode',
                        'tbl_detail_kspn.thn_periode_keg',
                        'tbl_detail_kspn.nama_propinsi',
                        'tbl_detail_kspn.nama_kabupatenkota',
                        'tbl_detail_kspn.pariwisata_kspn',
                        'tbl_detail_kspn.thn_penetapan'
                    )->searchOrder($request, [
                        'tbl_detail_kspn.lokasi_kode',
                        'tbl_detail_kspn.thn_periode_keg',
                        'tbl_detail_kspn.nama_propinsi',
                        'tbl_detail_kspn.nama_kabupatenkota',
                        'tbl_detail_kspn.pariwisata_kspn',
                        'tbl_detail_kspn.thn_penetapan'
                    ])
                    ->paginate($limit);

        return (new KspnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KspnTransformer)->transformDetail($model);
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
        $model->pariwisata_kspn = $request->input('pariwisata_kspn');
        $model->tipe_dok_kspn = $request->input('tipe_dok_kspn');
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
        $model->pariwisata_kspn = $request->input('pariwisata_kspn');
        $model->tipe_dok_kspn = $request->input('tipe_dok_kspn');
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