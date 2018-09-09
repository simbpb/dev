<?php
namespace App\Models\Detail\KwsDpn;

use DB;
use File;
use App\Helpers\Location;

class KwsDpnRepository
{

    protected $model;
    protected $basePath1 = '/files/details/kws-dpn/file-upload';

      
    public function __construct(KwsDpn $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_kws_dpn.id',
                        'tbl_detail_kws_dpn.detail_kdprog_id',
                        'tbl_detail_kws_dpn.thn_periode_keg',
                        'tbl_detail_kws_dpn.lokasi_kode',
                        'tbl_detail_kws_dpn.nama_propinsi',
                        'tbl_detail_kws_dpn.nama_dpn',
                        'tbl_detail_kws_dpn.uraian_kws_dpn'
                    )->searchOrder($request, [
                        'tbl_detail_kws_dpn.detail_kdprog_id',
                        'tbl_detail_kws_dpn.thn_periode_keg',
                        'tbl_detail_kws_dpn.lokasi_kode',
                        'tbl_detail_kws_dpn.nama_propinsi',
                        'tbl_detail_kws_dpn.nama_dpn',
                        'tbl_detail_kws_dpn.uraian_kws_dpn'
                    ])
                    ->paginate($limit);

        return (new KwsDpnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new KwsDpnTransformer)->transformDetail($model);
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
        $model->nama_dpn = $request->input('nama_dpn');
        $model->uraian_kws_dpn = $request->input('uraian_kws_dpn');
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
        $model->nama_dpn = $request->input('nama_dpn');
        $model->uraian_kws_dpn = $request->input('uraian_kws_dpn');
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