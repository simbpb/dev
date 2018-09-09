<?php
namespace App\Models\Detail\Tabg;

use DB;
use File;
use App\Helpers\Location;

class TabgRepository
{

    protected $model;
    protected $basePath1 = '/files/details/tabg/file-upload-perbub-perwal';
protected $basePath2 = '/files/details/tabg/file-upload-sk-pengangkatan';

      
    public function __construct(Tabg $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_tabg.id',
                        'tbl_detail_tabg.detail_kdprog_id',
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.lokasi_kode',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.no_perbub_perwal',
                        'tbl_detail_tabg.tgl_penetapan_perbub_perwal'
                    )->searchOrder($request, [
                        'tbl_detail_tabg.detail_kdprog_id',
                        'tbl_detail_tabg.thn_periode_keg',
                        'tbl_detail_tabg.lokasi_kode',
                        'tbl_detail_tabg.nama_propinsi',
                        'tbl_detail_tabg.nama_kabupatenkota',
                        'tbl_detail_tabg.no_perbub_perwal',
                        'tbl_detail_tabg.tgl_penetapan_perbub_perwal'
                    ])
                    ->paginate($limit);

        return (new TabgTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new TabgTransformer)->transformDetail($model);
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

                    if ($request->hasFile('file_upload_sk_pengangkatan')) {
                        $image = $request->file('file_upload_sk_pengangkatan');
                        $filename = str_slug($request->file_upload_sk_pengangkatan).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath2);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sk_pengangkatan = $this->basePath2.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
$model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal');
$model->nama_lengkap = $request->input('nama_lengkap');
$model->keahlian = $request->input('keahlian');
$model->sk_pengangkatan = $request->input('sk_pengangkatan');
$model->masa_tugas = $request->input('masa_tugas');
$model->fungsi_bg_terdata_dan_imb = $request->input('fungsi_bg_terdata_dan_imb');
$model->tipe_bg_terdata_dan_imb = $request->input('tipe_bg_terdata_dan_imb');
$model->nama_pemilik_bg_terdata_imb = $request->input('nama_pemilik_bg_terdata_imb');
$model->lok_bg_terdata_imb = $request->input('lok_bg_terdata_imb');
$model->fungsi_bg_terdata_dan_slf = $request->input('fungsi_bg_terdata_dan_slf');
$model->tipe_bg_terdata_dan_slf = $request->input('tipe_bg_terdata_dan_slf');
$model->nama_pemilik_bg_terdata_slf = $request->input('nama_pemilik_bg_terdata_slf');
$model->lok_bg_terdata_slf = $request->input('lok_bg_terdata_slf');
$model->no_imb_bg_didampingi_tabg = $request->input('no_imb_bg_didampingi_tabg');
$model->no_slf_bg_didampingi_tabg = $request->input('no_slf_bg_didampingi_tabg');
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

                    if ($request->hasFile('file_upload_sk_pengangkatan')) {
                        $image = $request->file('file_upload_sk_pengangkatan');
                        if (File::exists(public_path($model->file_upload_sk_pengangkatan))) {
                            File::delete(public_path($model->file_upload_sk_pengangkatan));
                        }
                        $filename = str_slug($request->file_upload_sk_pengangkatan).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath2);
                        $image->move($destinationPath, $filename);
                        $model->file_upload_sk_pengangkatan = $this->basePath2.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->no_perbub_perwal = $request->input('no_perbub_perwal');
$model->tgl_penetapan_perbub_perwal = $request->input('tgl_penetapan_perbub_perwal');
$model->nama_lengkap = $request->input('nama_lengkap');
$model->keahlian = $request->input('keahlian');
$model->sk_pengangkatan = $request->input('sk_pengangkatan');
$model->masa_tugas = $request->input('masa_tugas');
$model->fungsi_bg_terdata_dan_imb = $request->input('fungsi_bg_terdata_dan_imb');
$model->tipe_bg_terdata_dan_imb = $request->input('tipe_bg_terdata_dan_imb');
$model->nama_pemilik_bg_terdata_imb = $request->input('nama_pemilik_bg_terdata_imb');
$model->lok_bg_terdata_imb = $request->input('lok_bg_terdata_imb');
$model->fungsi_bg_terdata_dan_slf = $request->input('fungsi_bg_terdata_dan_slf');
$model->tipe_bg_terdata_dan_slf = $request->input('tipe_bg_terdata_dan_slf');
$model->nama_pemilik_bg_terdata_slf = $request->input('nama_pemilik_bg_terdata_slf');
$model->lok_bg_terdata_slf = $request->input('lok_bg_terdata_slf');
$model->no_imb_bg_didampingi_tabg = $request->input('no_imb_bg_didampingi_tabg');
$model->no_slf_bg_didampingi_tabg = $request->input('no_slf_bg_didampingi_tabg');
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