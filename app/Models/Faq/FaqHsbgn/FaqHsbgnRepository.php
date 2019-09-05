<?php
namespace App\Models\Faq\FaqHsbgn;

use DB;
use File;

class FaqHsbgnRepository
{

    protected $model;
    protected $basePath1 = '/files/faqs/faq-hsbgn/file-sk-penetapan-hsbgn';

      
    public function __construct(
        FaqHsbgn $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_hsbgn.id',
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    )->searchOrder($request, [
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new FaqHsbgnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return $model;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
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

        $model->hsbgn_id = $request->input('hsbgn_id');
		$model->info_wilayah_id = $request->input('info_wilayah_id');
		$model->detail_kdprog_id = $request->input('detail_kdprog_id');
		$model->thn_periode_keg = $request->input('thn_periode_keg');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->tahun_penetapan = $request->input('tahun_penetapan');
		$model->nama_propinsi = $request->input('nama_propinsi');
		$model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->kd_struktur = $request->input('kd_struktur');
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
		$model->tgl_input_wilayah = $request->input('tgl_input_wilayah');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
        
        $model->save();
        
        DB::commit();
        return true;
    }

    public function listByLokasi($lokasiKode, $request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'faq_hsbgn.id',
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    )->searchOrder($request, [
                        'faq_hsbgn.hsbgn_id',
						'faq_hsbgn.info_wilayah_id',
						'faq_hsbgn.detail_kdprog_id',
						'faq_hsbgn.thn_periode_keg',
						'faq_hsbgn.lokasi_kode',
						'faq_hsbgn.tahun_penetapan',
						'faq_hsbgn.nama_propinsi',
						'faq_hsbgn.nama_kabupatenkota',
						'faq_hsbgn.nama_kecamatan',
						'faq_hsbgn.kd_struktur',
						'faq_hsbgn.angka_luas_wilayah',
						'faq_hsbgn.satuan_luas_wilayah',
						'faq_hsbgn.zona',
						'faq_hsbgn.bg_tidak_sederhana',
						'faq_hsbgn.bg_sederhana',
						'faq_hsbgn.rumahnegara_tipe_a',
						'faq_hsbgn.rumahnegara_tipe_b',
						'faq_hsbgn.rumahnegara_tipe_c_d_e',
						'faq_hsbgn.pagar_gedungnegara_depan',
						'faq_hsbgn.pagar_gedungnegara_samping',
						'faq_hsbgn.pagar_gedungnegara_belakang',
						'faq_hsbgn.pagar_rumahnegara_depan',
						'faq_hsbgn.pagar_rumahnegara_samping',
						'faq_hsbgn.pagar_rumahnegara_belakang',
						'faq_hsbgn.sk_penetapan',
						'faq_hsbgn.file_sk_penetapan_hsbgn',
						'faq_hsbgn.indeks_kemahalan_konstruksi',
						'faq_hsbgn.tgl_input_wilayah',
						'faq_hsbgn.info_wilayah_sk',
						'faq_hsbgn.last_update',
                        'faq_hsbgn.is_actived'
                    ])
                    ->where('lokasi_kode',$lokasiKode)
                    ->paginate($limit);

        return (new FaqHsbgnTransformer)->transformPaginate($model);
    }
}