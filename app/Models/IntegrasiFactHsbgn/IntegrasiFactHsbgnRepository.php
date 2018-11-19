<?php
namespace App\Models\IntegrasiFactHsbgn;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class IntegrasiFactHsbgnRepository
{

    protected $model;
      
    public function __construct(
        IntegrasiFactHsbgn $model
    ) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'integrasi_fact_hsbgn.id',
                        'integrasi_fact_hsbgn.id_tbl_hsbgn',
						'integrasi_fact_hsbgn.id_info_wilayah',
						'integrasi_fact_hsbgn.lokasi_kode',
						'integrasi_fact_hsbgn.kd_struktur',
						'integrasi_fact_hsbgn.uraian',
						'integrasi_fact_hsbgn.tahun_penetapan',
						'integrasi_fact_hsbgn.nama_kecamatan',
						'integrasi_fact_hsbgn.klasifikasi_berdasarkan_sasaran_utama',
						'integrasi_fact_hsbgn.luas_wilayah',
						'integrasi_fact_hsbgn.angka_luas_wilayah',
						'integrasi_fact_hsbgn.satuan_luas_wilayah',
						'integrasi_fact_hsbgn.zona',
						'integrasi_fact_hsbgn.bg_tidak_sederhana',
						'integrasi_fact_hsbgn.bg_sederhana',
						'integrasi_fact_hsbgn.rumahnegara_tipe_a',
						'integrasi_fact_hsbgn.rumahnegara_tipe_b',
						'integrasi_fact_hsbgn.rumahnegara_tipe_c_d_e',
						'integrasi_fact_hsbgn.pagar_gedungnegara_depan',
						'integrasi_fact_hsbgn.pagar_gedungnegara_samping',
						'integrasi_fact_hsbgn.pagar_gedungnegara_belakang',
						'integrasi_fact_hsbgn.pagar_rumahnegara_depan',
						'integrasi_fact_hsbgn.pagar_rumahnegara_samping',
						'integrasi_fact_hsbgn.pagar_rumahnegara_belakang',
						'integrasi_fact_hsbgn.sk_penetapan',
						'integrasi_fact_hsbgn.indeks_kemahalan_konstruksi',
						'integrasi_fact_hsbgn.tgl_input_hsbgn',
						'integrasi_fact_hsbgn.info_wilayah_sk',
						'integrasi_fact_hsbgn.last_update'
                    )->searchOrder($request, [
                        'integrasi_fact_hsbgn.id_tbl_hsbgn',
						'integrasi_fact_hsbgn.id_info_wilayah',
						'integrasi_fact_hsbgn.lokasi_kode',
						'integrasi_fact_hsbgn.kd_struktur',
						'integrasi_fact_hsbgn.uraian',
						'integrasi_fact_hsbgn.tahun_penetapan',
						'integrasi_fact_hsbgn.nama_kecamatan',
						'integrasi_fact_hsbgn.klasifikasi_berdasarkan_sasaran_utama',
						'integrasi_fact_hsbgn.luas_wilayah',
						'integrasi_fact_hsbgn.angka_luas_wilayah',
						'integrasi_fact_hsbgn.satuan_luas_wilayah',
						'integrasi_fact_hsbgn.zona',
						'integrasi_fact_hsbgn.bg_tidak_sederhana',
						'integrasi_fact_hsbgn.bg_sederhana',
						'integrasi_fact_hsbgn.rumahnegara_tipe_a',
						'integrasi_fact_hsbgn.rumahnegara_tipe_b',
						'integrasi_fact_hsbgn.rumahnegara_tipe_c_d_e',
						'integrasi_fact_hsbgn.pagar_gedungnegara_depan',
						'integrasi_fact_hsbgn.pagar_gedungnegara_samping',
						'integrasi_fact_hsbgn.pagar_gedungnegara_belakang',
						'integrasi_fact_hsbgn.pagar_rumahnegara_depan',
						'integrasi_fact_hsbgn.pagar_rumahnegara_samping',
						'integrasi_fact_hsbgn.pagar_rumahnegara_belakang',
						'integrasi_fact_hsbgn.sk_penetapan',
						'integrasi_fact_hsbgn.indeks_kemahalan_konstruksi',
						'integrasi_fact_hsbgn.tgl_input_hsbgn',
						'integrasi_fact_hsbgn.info_wilayah_sk',
						'integrasi_fact_hsbgn.last_update'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new IntegrasiFactHsbgnTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new IntegrasiFactHsbgnTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $model = $this->model;

        $model->id_tbl_hsbgn = $request->input('id_tbl_hsbgn');
		$model->id_info_wilayah = $request->input('id_info_wilayah');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->uraian = $request->input('uraian');
		$model->tahun_penetapan = $request->input('tahun_penetapan');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
		$model->luas_wilayah = $request->input('luas_wilayah');
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
		$model->tgl_input_hsbgn = $request->input('tgl_input_hsbgn');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $model = $this->model->find($id);

        $model->id_tbl_hsbgn = $request->input('id_tbl_hsbgn');
		$model->id_info_wilayah = $request->input('id_info_wilayah');
		$model->lokasi_kode = $request->input('lokasi_kode');
		$model->kd_struktur = $request->input('kd_struktur');
		$model->uraian = $request->input('uraian');
		$model->tahun_penetapan = $request->input('tahun_penetapan');
		$model->nama_kecamatan = $request->input('nama_kecamatan');
		$model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
		$model->luas_wilayah = $request->input('luas_wilayah');
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
		$model->tgl_input_hsbgn = $request->input('tgl_input_hsbgn');
		$model->info_wilayah_sk = $request->input('info_wilayah_sk');
		$model->last_update = $request->input('last_update');
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