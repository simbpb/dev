<?php
namespace App\Models\Detail\Rtbl;

use DB;
use File;
use App\Helpers\Location;

class RtblRepository
{

    protected $model;
    protected $basePath1 = '/files/details/rtbl/perhub-perwal';
    protected $basePath2 = '/files/details/rtbl/rtbl-file';
      
    public function __construct(Rtbl $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_rtbl.id',
                        'tbl_detail_rtbl.lokasi_kode',
                        'tbl_detail_rtbl.thn_periode_keg',
                        'tbl_detail_rtbl.nama_propinsi',
                        'tbl_detail_rtbl.nama_kabupatenkota',
                        'tbl_detail_rtbl.no_perbub_perwal'
                    )->searchOrder($request, [
                        'tbl_detail_rtbl.lokasi_kode',
                        'tbl_detail_rtbl.thn_periode_keg',
                        'tbl_detail_rtbl.nama_propinsi',
                        'tbl_detail_rtbl.nama_kabupatenkota',
                        'tbl_detail_rtbl.no_perbub_perwal'
                    ])
                    ->paginate($limit);

        return (new RtblTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new RtblTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        if ($request->hasFile('file_upload_perbub_perwal')) {
           $image = $request->file('file_upload_perbub_perwal');
           $filename = str_slug($request->file_upload_perbub_perwal).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath1);
           $image->move($destinationPath, $filename);
           $model->file_upload_perbub_perwal = $this->basePath1.'/'.$filename;
        }

        if ($request->hasFile('file_upload_rtbl')) {
           $image = $request->file('file_upload_rtbl');
           $filename = str_slug($request->file_upload_rtbl).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath2);
           $image->move($destinationPath, $filename);
           $model->file_upload_rtbl = $this->basePath2.'/'.$filename;
        }
        
        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
        $model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal_submit');
        $model->tahun_rtbl = $request->input('tahun_rtbl');
        $model->usulan_kws_rtbl = $request->input('usulan_kws_rtbl');
        $model->luas_kws = $request->input('luas_kws');
        $model->satuan_luas_kws = $request->input('satuan_luas_kws');
        $model->cakupan_wilayah = $request->input('cakupan_wilayah');
        $model->uraian_karakter_lokasi = $request->input('uraian_karakter_lokasi');
        $model->uraian_usulan_kws = $request->input('uraian_usulan_kws');
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
        
        if ($request->hasFile('file_upload_perbub_perwal')) {
            $image = $request->file('file_upload_perbub_perwal');
            if (File::exists(public_path($model->file_upload_perbub_perwal))) {
               File::delete(public_path($model->file_upload_perbub_perwal));
            }
            $filename = str_slug($request->file_upload_perbub_perwal).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath1);
            $image->move($destinationPath, $filename);
            $model->file_upload_perbub_perwal = $this->basePath1.'/'.$filename;
        }

        if ($request->hasFile('file_upload_rtbl')) {
            $image = $request->file('file_upload_rtbl');
            if (File::exists(public_path($model->file_upload_rtbl))) {
               File::delete(public_path($model->file_upload_rtbl));
            }
            $filename = str_slug($request->file_upload_rtbl).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath2);
            $image->move($destinationPath, $filename);
            $model->file_upload_rtbl = $this->basePath2.'/'.$filename;
        }

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
        $model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal_submit');
        $model->tahun_rtbl = $request->input('tahun_rtbl');
        $model->usulan_kws_rtbl = $request->input('usulan_kws_rtbl');
        $model->luas_kws = $request->input('luas_kws');
        $model->satuan_luas_kws = $request->input('satuan_luas_kws');
        $model->cakupan_wilayah = $request->input('cakupan_wilayah');
        $model->uraian_karakter_lokasi = $request->input('uraian_karakter_lokasi');
        $model->uraian_usulan_kws = $request->input('uraian_usulan_kws');
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