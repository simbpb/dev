<?php
namespace App\Models\Detail\PelepasanRng3;

use DB;
use File;
use App\Helpers\Location;

class PelepasanRng3Repository
{

    protected $model;
    protected $basePath1 = '/files/details/pelepasan-rng3/sk-gol3';
    protected $basePath2 = '/files/details/pelepasan-rng3/sip-gol3';
    protected $basePath3 = '/files/details/pelepasan-rng3/sk-menteri';
      
    public function __construct(PelepasanRng3 $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_pelepasan_rng3.id',
                        'tbl_detail_pelepasan_rng3.lokasi_kode',
                        'tbl_detail_pelepasan_rng3.thn_periode_keg',
                        'tbl_detail_pelepasan_rng3.nama_propinsi',
                        'tbl_detail_pelepasan_rng3.nama_kabupatenkota',
                        'tbl_detail_pelepasan_rng3.hdno_rn',
                        'tbl_detail_pelepasan_rng3.nama_penghuni'
                    )->searchOrder($request, [
                        'tbl_detail_pelepasan_rng3.lokasi_kode',
                        'tbl_detail_pelepasan_rng3.thn_periode_keg',
                        'tbl_detail_pelepasan_rng3.nama_propinsi',
                        'tbl_detail_pelepasan_rng3.nama_kabupatenkota',
                        'tbl_detail_pelepasan_rng3.hdno_rn',
                        'tbl_detail_pelepasan_rng3.nama_penghuni'
                    ])
                    ->paginate($limit);

        return (new PelepasanRng3Transformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new PelepasanRng3Transformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $kecamatan = Location::getKecamatan($request->input('propinsi_id'), $request->input('kota_id'), $request->input('kecamatan_id'));
        $model = $this->model;

        if ($request->hasFile('file_upload_sk_gol3')) {
           $image = $request->file('file_upload_sk_gol3');
           $filename = str_slug($request->file_upload_sk_gol3).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath1);
           $image->move($destinationPath, $filename);
           $model->file_upload_sk_gol3 = $this->basePath1.'/'.$filename;
        }

        if ($request->hasFile('file_upload_sip_gol3')) {
           $image = $request->file('file_upload_sip_gol3');
           $filename = str_slug($request->file_upload_sip_gol3).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath2);
           $image->move($destinationPath, $filename);
           $model->file_upload_sip_gol3 = $this->basePath2.'/'.$filename;
        }

        if ($request->hasFile('file_upload_sk_menteri_pupr')) {
           $image = $request->file('file_upload_sk_menteri_pupr');
           $filename = str_slug($request->file_upload_sk_menteri_pupr).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath3);
           $image->move($destinationPath, $filename);
           $model->file_upload_sk_menteri_pupr = $this->basePath3.'/'.$filename;
        }
        
        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $kecamatan->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kecamatan = !empty($request->input('kecamatan_id')) ? $kecamatan->nama_kecamatan : 'Belum Ditentukan';
        $model->hdno_rn = $request->input('hdno_rn');
        $model->nama_penghuni = $request->input('nama_penghuni');
        $model->kemen_lembaga = $request->input('kemen_lembaga');
        $model->alamat_rn = $request->input('alamat_rn');
        $model->no_sk_gol3 = $request->input('no_sk_gol3');
        $model->no_sip_gol3 = $request->input('no_sip_gol3');
        $model->no_sk_menteri_pupr = $request->input('no_sk_menteri_pupr');
        $model->thn_perjanjian_sewabeli = $request->input('thn_perjanjian_sewabeli');
        $model->status_rn = $request->input('status_rn');
        $model->thn_pelepasan_rng3 = $request->input('thn_pelepasan_rng3');
        $model->sk_hak_milik = $request->input('sk_hak_milik');
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
        $kecamatan = Location::getKecamatan($request->input('propinsi_id'), $request->input('kota_id'), $request->input('kecamatan_id'));
        $model = $this->model->find($id);
        
        if ($request->hasFile('file_upload_sk_gol3')) {
            $image = $request->file('file_upload_sk_gol3');
            if (File::exists(public_path($model->file_upload_sk_gol3))) {
               File::delete(public_path($model->file_upload_sk_gol3));
            }
            $filename = str_slug($request->file_upload_sk_gol3).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath1);
            $image->move($destinationPath, $filename);
            $model->file_upload_sk_gol3 = $this->basePath1.'/'.$filename;
        }

        if ($request->hasFile('file_upload_sip_gol3')) {
            $image = $request->file('file_upload_sip_gol3');
            if (File::exists(public_path($model->file_upload_sip_gol3))) {
               File::delete(public_path($model->file_upload_sip_gol3));
            }
            $filename = str_slug($request->file_upload_sip_gol3).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath2);
            $image->move($destinationPath, $filename);
            $model->file_upload_sip_gol3 = $this->basePath2.'/'.$filename;
        }

        if ($request->hasFile('file_upload_sk_menteri_pupr')) {
            $image = $request->file('file_upload_sk_menteri_pupr');
            if (File::exists(public_path($model->file_upload_sk_menteri_pupr))) {
               File::delete(public_path($model->file_upload_sk_menteri_pupr));
            }
            $filename = str_slug($request->file_upload_sk_menteri_pupr).'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($this->basePath3);
            $image->move($destinationPath, $filename);
            $model->file_upload_sk_menteri_pupr = $this->basePath3.'/'.$filename;
        }

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $kecamatan->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_kecamatan = !empty($request->input('kecamatan_id')) ? $kecamatan->nama_kecamatan : 'Belum Ditentukan';
        $model->hdno_rn = $request->input('hdno_rn');
        $model->nama_penghuni = $request->input('nama_penghuni');
        $model->kemen_lembaga = $request->input('kemen_lembaga');
        $model->alamat_rn = $request->input('alamat_rn');
        $model->no_sk_gol3 = $request->input('no_sk_gol3');
        $model->no_sip_gol3 = $request->input('no_sip_gol3');
        $model->no_sk_menteri_pupr = $request->input('no_sk_menteri_pupr');
        $model->thn_perjanjian_sewabeli = $request->input('thn_perjanjian_sewabeli');
        $model->status_rn = $request->input('status_rn');
        $model->thn_pelepasan_rng3 = $request->input('thn_pelepasan_rng3');
        $model->sk_hak_milik = $request->input('sk_hak_milik');
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