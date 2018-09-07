<?php
namespace App\Models\Detail\NspkPerdabg;

use DB;
use File;
use App\Helpers\Location;

class NspkPerdabgRepository
{

    protected $model;
    protected $basePath = '/files/details/nspk-perdabg';
      
    public function __construct(NspkPerdabg $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_nspk_perdabg.id',
                        'tbl_detail_nspk_perdabg.lokasi_kode',
                        'tbl_detail_nspk_perdabg.thn_periode_keg',
                        'tbl_detail_nspk_perdabg.nama_propinsi',
                        'tbl_detail_nspk_perdabg.nama_kabupatenkota',
                        'tbl_detail_nspk_perdabg.no_perdabg',
                        'tbl_detail_nspk_perdabg.nama_pejabat_yg_menetapkan'
                    )->searchOrder($request, [
                        'tbl_detail_nspk_perdabg.lokasi_kode',
                        'tbl_detail_nspk_perdabg.thn_periode_keg',
                        'tbl_detail_nspk_perdabg.nama_propinsi',
                        'tbl_detail_nspk_perdabg.nama_kabupatenkota',
                        'tbl_detail_nspk_perdabg.no_perdabg',
                        'tbl_detail_nspk_perdabg.nama_pejabat_yg_menetapkan'
                    ])
                    ->paginate($limit);

        return (new NspkPerdabgTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new NspkPerdabgTransformer)->transformDetail($model);
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
        $model->info_wilayah_id = '1000';
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->status_perdabg = $request->input('status_perdabg');
        $model->no_perdabg = $request->input('no_perdabg');
        $model->tempat_penetapan = $request->input('tempat_penetapan');
        $model->tgl_penetapan = '01';
        $model->bln_penetapan = '01';
        $model->thn_perdabg = $request->input('thn_perdabg');
        $model->tgl_input_perdabg = $request->input('tgl_input_perdabg_submit');
        $model->nama_pejabat_yg_menetapkan = $request->input('nama_pejabat_yg_menetapkan');
        $model->keterangan = $request->input('keterangan');
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
        $model->info_wilayah_id = '1000';
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->status_perdabg = $request->input('status_perdabg');
        $model->no_perdabg = $request->input('no_perdabg');
        $model->tempat_penetapan = $request->input('tempat_penetapan');
        $model->tgl_penetapan = '01';
        $model->bln_penetapan = '01';
        $model->thn_perdabg = $request->input('thn_perdabg');
        $model->tgl_input_perdabg = $request->input('tgl_input_perdabg_submit');
        $model->nama_pejabat_yg_menetapkan = $request->input('nama_pejabat_yg_menetapkan');
        $model->keterangan = $request->input('keterangan');
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