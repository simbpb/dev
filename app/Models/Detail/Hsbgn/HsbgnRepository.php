<?php
namespace App\Models\Detail\Hsbgn;

use DB;
use File;
use App\Helpers\Location;

class HsbgnRepository
{

    protected $model;
    protected $basePath1 = '/files/details/hsbgn/file-sk-penetapan';

      
    public function __construct(Hsbgn $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_hsbgn.id',
                        'tbl_detail_hsbgn.detail_kdprog_id',
                        'tbl_detail_hsbgn.thn_periode_keg',
                        'tbl_detail_hsbgn.lokasi_kode',
                        'tbl_detail_hsbgn.nama_propinsi',
                        'tbl_detail_hsbgn.nama_kabupatenkota',
                        'tbl_detail_hsbgn.thn_penetapan',
'tbl_detail_hsbgn.nama_kecamatan',
'tbl_detail_hsbgn.zona',
'tbl_detail_hsbgn.bg_tidak_sederhana',
'tbl_detail_hsbgn.bg_sederhana',
'tbl_detail_hsbgn.rn_tipe_a',
'tbl_detail_hsbgn.rn_tipe_b',
'tbl_detail_hsbgn.rn_tipe_c_d_e',
'tbl_detail_hsbgn.pagar_gedungnegara_dpn',
'tbl_detail_hsbgn.pagar_gedungnegara_samping',
'tbl_detail_hsbgn.pagar_gedungnegara_blkg',
'tbl_detail_hsbgn.pagar_rn_dpn',
'tbl_detail_hsbgn.pagar_rn_samping',
'tbl_detail_hsbgn.pagar_rn_blkg',
'tbl_detail_hsbgn.harga_satuan',
'tbl_detail_hsbgn.sk_penetapan',
'tbl_detail_hsbgn.file_sk_penetapan',
'tbl_detail_hsbgn.indeks_kemahalan_konstruksi'
                    )->searchOrder($request, [
                        'tbl_detail_hsbgn.detail_kdprog_id',
                        'tbl_detail_hsbgn.thn_periode_keg',
                        'tbl_detail_hsbgn.lokasi_kode',
                        'tbl_detail_hsbgn.nama_propinsi',
                        'tbl_detail_hsbgn.nama_kabupatenkota',
                        'tbl_detail_hsbgn.thn_penetapan',
'tbl_detail_hsbgn.nama_kecamatan',
'tbl_detail_hsbgn.zona',
'tbl_detail_hsbgn.bg_tidak_sederhana',
'tbl_detail_hsbgn.bg_sederhana',
'tbl_detail_hsbgn.rn_tipe_a',
'tbl_detail_hsbgn.rn_tipe_b',
'tbl_detail_hsbgn.rn_tipe_c_d_e',
'tbl_detail_hsbgn.pagar_gedungnegara_dpn',
'tbl_detail_hsbgn.pagar_gedungnegara_samping',
'tbl_detail_hsbgn.pagar_gedungnegara_blkg',
'tbl_detail_hsbgn.pagar_rn_dpn',
'tbl_detail_hsbgn.pagar_rn_samping',
'tbl_detail_hsbgn.pagar_rn_blkg',
'tbl_detail_hsbgn.harga_satuan',
'tbl_detail_hsbgn.sk_penetapan',
'tbl_detail_hsbgn.file_sk_penetapan',
'tbl_detail_hsbgn.indeks_kemahalan_konstruksi'
                    ])
                    ->paginate($limit);

        return (new HsbgnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new HsbgnTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model;

        
                    if ($request->hasFile('file_sk_penetapan')) {
                        $image = $request->file('file_sk_penetapan');
                        $filename = str_slug($request->file_sk_penetapan).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_sk_penetapan = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->thn_penetapan = $request->input('thn_penetapan');
$model->nama_kecamatan = $request->input('nama_kecamatan');
$model->zona = $request->input('zona');
$model->bg_tidak_sederhana = $request->input('bg_tidak_sederhana');
$model->bg_sederhana = $request->input('bg_sederhana');
$model->rn_tipe_a = $request->input('rn_tipe_a');
$model->rn_tipe_b = $request->input('rn_tipe_b');
$model->rn_tipe_c_d_e = $request->input('rn_tipe_c_d_e');
$model->pagar_gedungnegara_dpn = $request->input('pagar_gedungnegara_dpn');
$model->pagar_gedungnegara_samping = $request->input('pagar_gedungnegara_samping');
$model->pagar_gedungnegara_blkg = $request->input('pagar_gedungnegara_blkg');
$model->pagar_rn_dpn = $request->input('pagar_rn_dpn');
$model->pagar_rn_samping = $request->input('pagar_rn_samping');
$model->pagar_rn_blkg = $request->input('pagar_rn_blkg');
$model->harga_satuan = $request->input('harga_satuan');
$model->sk_penetapan = $request->input('sk_penetapan');
$model->indeks_kemahalan_konstruksi = $request->input('indeks_kemahalan_konstruksi');
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
        
        
                    if ($request->hasFile('file_sk_penetapan')) {
                        $image = $request->file('file_sk_penetapan');
                        if (File::exists(public_path($model->file_sk_penetapan))) {
                            File::delete(public_path($model->file_sk_penetapan));
                        }
                        $filename = str_slug($request->file_sk_penetapan).'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path($this->basePath1);
                        $image->move($destinationPath, $filename);
                        $model->file_sk_penetapan = $this->basePath1.'/'.$filename;
                    }


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->thn_penetapan = $request->input('thn_penetapan');
$model->nama_kecamatan = $request->input('nama_kecamatan');
$model->zona = $request->input('zona');
$model->bg_tidak_sederhana = $request->input('bg_tidak_sederhana');
$model->bg_sederhana = $request->input('bg_sederhana');
$model->rn_tipe_a = $request->input('rn_tipe_a');
$model->rn_tipe_b = $request->input('rn_tipe_b');
$model->rn_tipe_c_d_e = $request->input('rn_tipe_c_d_e');
$model->pagar_gedungnegara_dpn = $request->input('pagar_gedungnegara_dpn');
$model->pagar_gedungnegara_samping = $request->input('pagar_gedungnegara_samping');
$model->pagar_gedungnegara_blkg = $request->input('pagar_gedungnegara_blkg');
$model->pagar_rn_dpn = $request->input('pagar_rn_dpn');
$model->pagar_rn_samping = $request->input('pagar_rn_samping');
$model->pagar_rn_blkg = $request->input('pagar_rn_blkg');
$model->harga_satuan = $request->input('harga_satuan');
$model->sk_penetapan = $request->input('sk_penetapan');
$model->indeks_kemahalan_konstruksi = $request->input('indeks_kemahalan_konstruksi');
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