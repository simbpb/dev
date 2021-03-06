<?php
namespace App\Helpers;

use DB;
use Auth;
use App\Models\Lokasi\Lokasi;

class Location {    

	public static function getPropinsiKota($propinsiId, $kotaId)
	{
		$model = Lokasi::select(
							'info_wilayah.lokasi_kode',
							'info_wilayah.nama_propinsi',
							'info_wilayah.nama_kabupatenkota'
						)
					->join('info_wilayah','info_wilayah.lokasi_kode','=','master_tabel_prov_kab_kec_kel.lokasi_kode')
							->where('master_tabel_prov_kab_kec_kel.lokasi_propinsi', $propinsiId)
							->where('master_tabel_prov_kab_kec_kel.lokasi_kabupatenkota', $kotaId)
							->where('master_tabel_prov_kab_kec_kel.lokasi_kecamatan', '00')
							->first();
		return $model;
	}

	public static function getKecamatan($propinsiId, $kotaId, $kecamatanId) 
	{
		$model = Lokasi::select('master_tabel_prov_kab_kec_kel.lokasi_kode','master_tabel_prov_kab_kec_kel.lokasi_nama as nama_kecamatan')
							->where('master_tabel_prov_kab_kec_kel.lokasi_propinsi', $propinsiId)
							->where('master_tabel_prov_kab_kec_kel.lokasi_kabupatenkota', $kotaId)
							->where('master_tabel_prov_kab_kec_kel.lokasi_kecamatan', $kecamatanId)
							->where('master_tabel_prov_kab_kec_kel.lokasi_kelurahan', '0000')
							->first();
		return $model;
	}
}