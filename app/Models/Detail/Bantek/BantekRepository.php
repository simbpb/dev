<?php
namespace App\Models\Detail\Bantek;

use DB;
use File;
use App\Helpers\Location;

class BantekRepository
{

    protected $model;
    protected $basePath1 = '/files/details/bantek/materi-bimtek';
    protected $basePath2 = '/files/details/bantek/keg-bimtek';
      
    public function __construct(Bantek $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_bantek.id',
                        'tbl_detail_bantek.lokasi_kode',
                        'tbl_detail_bantek.thn_periode_keg',
                        'tbl_detail_bantek.nama_propinsi',
                        'tbl_detail_bantek.nama_kabupatenkota',
                        'tbl_detail_bantek.uraian_sasaran'
                    )->searchOrder($request, [
                        'tbl_detail_bantek.lokasi_kode',
                        'tbl_detail_bantek.thn_periode_keg',
                        'tbl_detail_bantek.nama_propinsi',
                        'tbl_detail_bantek.nama_kabupatenkota',
                        'tbl_detail_bantek.uraian_sasaran'
                    ])
                    ->paginate($limit);

        return (new BantekTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new BantekTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        if ($request->hasFile('file_upload_materi_bimtek')) {
           $image = $request->file('file_upload_materi_bimtek');
           $filename = str_slug($request->file_upload_materi_bimtek).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath1);
           $image->move($destinationPath, $filename);
           $model->file_upload_materi_bimtek = $this->basePath1.'/'.$filename;
        }

        if ($request->hasFile('foto_keg_bimtek')) {
           $image = $request->file('foto_keg_bimtek');
           $filename = str_slug($request->foto_keg_bimtek).'.'.$image->getClientOriginalExtension();
           $destinationPath = public_path($this->basePath2);
           $image->move($destinationPath, $filename);
           $model->foto_keg_bimtek = $this->basePath2.'/'.$filename;
        }
        
        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->nama_bgn_yg_difasilitasi = $request->input('nama_bgn_yg_difasilitasi');
        $model->nama_penyelenggara = $request->input('nama_penyelenggara');
        $model->waktu_penyelenggara = $request->input('waktu_penyelenggara');
        $model->uraian_sasaran = $request->input('uraian_sasaran');
        $model->materi_kepmen_no332thn2002_disampaikan = $request->input('materi_kepmen_no332thn2002_disampaikan');
        $model->materi_juknis_pt_disampaikan = $request->input('materi_juknis_pt_disampaikan');
        $model->materi_keppres_no80thn2003_disampaikan = $request->input('materi_keppres_no80thn2003_disampaikan');
        $model->materi_hsbgn_disampaikan = $request->input('materi_hsbgn_disampaikan');
        $model->materi_kepmen_no29thn2006_disampaikan = $request->input('materi_kepmen_no29thn2006_disampaikan');
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
        $model->nama_bgn_yg_difasilitasi = $request->input('nama_bgn_yg_difasilitasi');
        $model->nama_penyelenggara = $request->input('nama_penyelenggara');
        $model->waktu_penyelenggara = $request->input('waktu_penyelenggara');
        $model->uraian_sasaran = $request->input('uraian_sasaran');
        $model->materi_kepmen_no332thn2002_disampaikan = $request->input('materi_kepmen_no332thn2002_disampaikan');
        $model->materi_juknis_pt_disampaikan = $request->input('materi_juknis_pt_disampaikan');
        $model->materi_keppres_no80thn2003_disampaikan = $request->input('materi_keppres_no80thn2003_disampaikan');
        $model->materi_hsbgn_disampaikan = $request->input('materi_hsbgn_disampaikan');
        $model->materi_kepmen_no29thn2006_disampaikan = $request->input('materi_kepmen_no29thn2006_disampaikan');
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