<?php
namespace App\Models\InfoWilayah;

use Auth;

class InfoWilayahRepository
{

      public function list($request)
      {
         $limit = (!empty($request['limit'])) ? $request['limit'] : 10;

         if (!empty($request) && $request['column'] == 'id') {
            $request['column'] = 'tbl_info_kewilayahan.id_info_kewilayahan';
         }

         $model = InfoWilayah::select(
                     'tbl_info_kewilayahan.id_info_kewilayahan',
                     'tbl_info_kewilayahan.provinsi',
                     'tbl_info_kewilayahan.kabupatenkota',
                     'tbl_info_kewilayahan.luas_wilayah_km',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2011',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2012',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2013',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2014',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2015',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2011',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2012',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2013',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2014',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2015',
                     'master_klasifikasi_kota.nama_klasifikasi_kota'
                  )->leftJoin('master_klasifikasi_kota',
                     'master_klasifikasi_kota.id_klasifikasi_kota','=','tbl_info_kewilayahan.klasifikasi_berdasarkan_sasaran_utama'
                  )->searchOrder($request,[
                     'tbl_info_kewilayahan.provinsi',
                     'tbl_info_kewilayahan.kabupatenkota',
                     'tbl_info_kewilayahan.luas_wilayah_km',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2011',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2012',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2013',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2014',
                     'tbl_info_kewilayahan.jml_penduduk_kota_2015',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2011',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2012',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2013',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2014',
                     'tbl_info_kewilayahan.jml_penduduk_desa_2015',
                     'master_klasifikasi_kota.nama_klasifikasi_kota'
                  ])->paginate($limit);

         return $model;
      }

      public function find($id)
      {
         return StrukturBpb::find($id);
      }
     
      public function create($params = [])
      {
         $userId = Auth::user()->user_id;
         $model = new StrukturBpb();
         return $model->save();
      }

      public function update($id, $params = [])
      {
         $userId = Auth::user()->user_id;
         $model = StrukturBpb::find($id);
         return $model->save();
      }

      public function delete($id)
      {
         return StrukturBpb::find($id)->delete();
      }
}