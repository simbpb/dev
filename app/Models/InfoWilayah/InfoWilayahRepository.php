<?php
namespace App\Models\InfoWilayah;

use DB;

class InfoWilayahRepository
{

    protected $model;
      
    public function __construct(InfoWilayah $model) {
        $this->model = $model;
    }

    public function list($request)
    {
        $limit = (!empty($request['limit'])) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'dim_info_wilayah.id',
                        'dim_info_wilayah.nama_propinsi',
                        'dim_info_wilayah.nama_kabupatenkota'
                   )->searchOrder($request, [
                        'dim_info_wilayah.nama_propinsi',
                        'dim_info_wilayah.nama_kabupatenkota'
                    ])->paginate($limit);

        return (new InfoWilayahTransformer)->transformPaginate($model);
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
        $model->nama_propinsi = $request->input('nama_propinsi');
        $model->nama_kabupatenkota = $request->input('nama_kabupatenkota');
        $model->kriteria_sistem_perkotaan_nasional = $request->input('kriteria_sistem_perkotaan_nasional');
        $model->kriteria_prioritas_pembangunan_perkotaan_nasional = $request->input('kriteria_prioritas_pembangunan_perkotaan_nasional');
        $model->kspn_1 = $request->input('kspn_1');
        $model->kspn_2 = $request->input('kspn_2');
        $model->kspn_3 = $request->input('kspn_3');
        $model->kspn_4 = $request->input('kspn_4');
        $model->kspn_5 = $request->input('kspn_5');
        $model->indeks_risiko_bencana = $request->input('indeks_risiko_bencana');
        $model->tingkat_risiko_bencana = $request->input('tingkat_risiko_bencana');
        $model->risiko_bencana_dominan = $request->input('risiko_bencana_dominan');
        $model->luas_wilayah = $request->input('luas_wilayah');
        $model->angka_luas_wilayah = $request->input('angka_luas_wilayah');
        $model->satuan_luas_wilayah = $request->input('satuan_luas_wilayah');
        $model->jml_penduduk_kota_2011 = $request->input('jml_penduduk_kota_2011');
        $model->jml_penduduk_kota_2012 = $request->input('jml_penduduk_kota_2012');
        $model->jml_penduduk_kota_2013 = $request->input('jml_penduduk_kota_2013');
        $model->jml_penduduk_kota_2014 = $request->input('jml_penduduk_kota_2014');
        $model->jml_penduduk_kota_2015 = $request->input('jml_penduduk_kota_2015');
        $model->jml_penduduk_kota_2016 = $request->input('jml_penduduk_kota_2016');
        $model->jml_penduduk_kota_2017 = $request->input('jml_penduduk_kota_2017');
        $model->jml_penduduk_kota_2018 = $request->input('jml_penduduk_kota_2018');
        $model->jml_penduduk_kota_2019 = $request->input('jml_penduduk_kota_2019');
        $model->jml_penduduk_desa_2011 = $request->input('jml_penduduk_desa_2011');
        $model->jml_penduduk_desa_2012 = $request->input('jml_penduduk_desa_2012');
        $model->jml_penduduk_desa_2013 = $request->input('jml_penduduk_desa_2013');
        $model->jml_penduduk_desa_2014 = $request->input('jml_penduduk_desa_2014');
        $model->jml_penduduk_desa_2015 = $request->input('jml_penduduk_desa_2015');
        $model->jml_penduduk_desa_2016 = $request->input('jml_penduduk_desa_2016');
        $model->jml_penduduk_desa_2017 = $request->input('jml_penduduk_desa_2017');
        $model->jml_penduduk_desa_2018 = $request->input('jml_penduduk_desa_2018');
        $model->jml_penduduk_desa_2019 = $request->input('jml_penduduk_desa_2019');
        $model->deskripsi = $request->input('deskripsi');
        $model->last_update = date('Y-m-d H:i:s');
        $model->save();
        DB::commit();
        return true;
    }

}