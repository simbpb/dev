<?php
namespace App\Models\Detail\Hsbgn;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;
use App\Helpers\Kodifikasi;

class HsbgnRepository
{

    protected $model;
    protected $kodifikasi;
    protected $basePath1 = '/files/details/hsbgn/file-sk-penetapan-hsbgn';

      
    public function __construct(
        Hsbgn $model
    ) {
        $this->model = $model;
        $this->kodifikasi = new Kodifikasi();
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_hsbgn.id',
                        'tbl_detail_hsbgn.thn_periode_keg',
                        'tbl_detail_hsbgn.nama_propinsi',
                        'tbl_detail_hsbgn.nama_kabupatenkota',
                        'tbl_detail_hsbgn.tahun_penetapan',
						'tbl_detail_hsbgn.nama_kecamatan',
						'tbl_detail_hsbgn.angka_luas_wilayah',
						'tbl_detail_hsbgn.satuan_luas_wilayah',
						'tbl_detail_hsbgn.zona',
						'tbl_detail_hsbgn.bg_tidak_sederhana',
						'tbl_detail_hsbgn.bg_sederhana',
						'tbl_detail_hsbgn.rumahnegara_tipe_a',
						'tbl_detail_hsbgn.rumahnegara_tipe_b',
						'tbl_detail_hsbgn.rumahnegara_tipe_c_d_e',
						'tbl_detail_hsbgn.pagar_gedungnegara_depan',
						'tbl_detail_hsbgn.pagar_gedungnegara_samping',
						'tbl_detail_hsbgn.pagar_gedungnegara_belakang',
						'tbl_detail_hsbgn.pagar_rumahnegara_depan',
						'tbl_detail_hsbgn.pagar_rumahnegara_samping',
						'tbl_detail_hsbgn.pagar_rumahnegara_belakang',
						'tbl_detail_hsbgn.sk_penetapan',
						'tbl_detail_hsbgn.file_sk_penetapan_hsbgn',
						'tbl_detail_hsbgn.indeks_kemahalan_konstruksi',
                        'tbl_detail_hsbgn.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_hsbgn.thn_periode_keg',
                        'tbl_detail_hsbgn.nama_propinsi',
                        'tbl_detail_hsbgn.nama_kabupatenkota',
                        'tbl_detail_hsbgn.tahun_penetapan',
						'tbl_detail_hsbgn.nama_kecamatan',
						'tbl_detail_hsbgn.angka_luas_wilayah',
						'tbl_detail_hsbgn.satuan_luas_wilayah',
						'tbl_detail_hsbgn.zona',
						'tbl_detail_hsbgn.bg_tidak_sederhana',
						'tbl_detail_hsbgn.bg_sederhana',
						'tbl_detail_hsbgn.rumahnegara_tipe_a',
						'tbl_detail_hsbgn.rumahnegara_tipe_b',
						'tbl_detail_hsbgn.rumahnegara_tipe_c_d_e',
						'tbl_detail_hsbgn.pagar_gedungnegara_depan',
						'tbl_detail_hsbgn.pagar_gedungnegara_samping',
						'tbl_detail_hsbgn.pagar_gedungnegara_belakang',
						'tbl_detail_hsbgn.pagar_rumahnegara_depan',
						'tbl_detail_hsbgn.pagar_rumahnegara_samping',
						'tbl_detail_hsbgn.pagar_rumahnegara_belakang',
						'tbl_detail_hsbgn.sk_penetapan',
						'tbl_detail_hsbgn.file_sk_penetapan_hsbgn',
						'tbl_detail_hsbgn.indeks_kemahalan_konstruksi',
                        'tbl_detail_hsbgn.is_actived'
                    ])
                    ->filterLocation()
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

        
		if ($request->hasFile('file_sk_penetapan_hsbgn')) {
			$image = $request->file('file_sk_penetapan_hsbgn');
			$filename = str_slug($request->file_sk_penetapan_hsbgn).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_penetapan_hsbgn = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->tahun_penetapan = $request->input('tahun_penetapan');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->angka_luas_wilayah = $request->input('angka_luas_wilayah');
		$model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
		$model->zona = $request->input('zona');
		$model->bg_tidak_sederhana = $request->input('bg_tidak_sederhana');
		$model->bg_sederhana = $request->input('bg_sederhana');
		$model->rumahnegara_tipe_a = $request->input('rumahnegara_tipe_a');
		$model->rumahnegara_tipe_b = $request->input('rumahnegara_tipe_b');
		$model->rumahnegara_tipe_c_d_e = $request->input('rumahnegara_tipe_c_d_e');
		$model->pagar_gedungnegara_depan = $request->input('pagar_gedungnegara_depan');
		$model->pagar_gedungnegara_samping = $request->input('pagar_gedungnegara_samping');
		$model->pagar_gedungnegara_belakang = $request->input('pagar_gedungnegara_belakang');
		$model->pagar_rumahnegara_depan = $request->input('pagar_rumahnegara_depan');
		$model->pagar_rumahnegara_samping = $request->input('pagar_rumahnegara_samping');
		$model->pagar_rumahnegara_belakang = $request->input('pagar_rumahnegara_belakang');
		$model->sk_penetapan = $request->input('sk_penetapan');
		$model->indeks_kemahalan_konstruksi = $request->input('indeks_kemahalan_konstruksi');
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        
		if ($request->hasFile('file_sk_penetapan_hsbgn')) {
			$image = $request->file('file_sk_penetapan_hsbgn');
			if (File::exists(public_path($model->file_sk_penetapan_hsbgn))) {
				File::delete(public_path($model->file_sk_penetapan_hsbgn));
			}
			$filename = str_slug($request->file_sk_penetapan_hsbgn).'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path($this->basePath1);
			$image->move($destinationPath, $filename);
			$model->file_sk_penetapan_hsbgn = $this->basePath1.'/'.$filename;
		}


        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->detail_kdprog_id = '0';
        $model->kd_struktur = $this->kodifikasi->getKodifikasi($request->input('program_id'));
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->tahun_penetapan = $request->input('tahun_penetapan');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->angka_luas_wilayah = $request->input('angka_luas_wilayah');
		$model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
		$model->zona = $request->input('zona');
		$model->bg_tidak_sederhana = $request->input('bg_tidak_sederhana');
		$model->bg_sederhana = $request->input('bg_sederhana');
		$model->rumahnegara_tipe_a = $request->input('rumahnegara_tipe_a');
		$model->rumahnegara_tipe_b = $request->input('rumahnegara_tipe_b');
		$model->rumahnegara_tipe_c_d_e = $request->input('rumahnegara_tipe_c_d_e');
		$model->pagar_gedungnegara_depan = $request->input('pagar_gedungnegara_depan');
		$model->pagar_gedungnegara_samping = $request->input('pagar_gedungnegara_samping');
		$model->pagar_gedungnegara_belakang = $request->input('pagar_gedungnegara_belakang');
		$model->pagar_rumahnegara_depan = $request->input('pagar_rumahnegara_depan');
		$model->pagar_rumahnegara_samping = $request->input('pagar_rumahnegara_samping');
		$model->pagar_rumahnegara_belakang = $request->input('pagar_rumahnegara_belakang');
		$model->sk_penetapan = $request->input('sk_penetapan');
		$model->indeks_kemahalan_konstruksi = $request->input('indeks_kemahalan_konstruksi');
        $model->is_actived = !empty($request->input('status')) ? '1' : '0';
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