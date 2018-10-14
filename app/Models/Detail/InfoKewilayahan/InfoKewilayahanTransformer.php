<?php
namespace App\Models\Detail\InfoKewilayahan;

use App\Enum\Status;

class InfoKewilayahanTransformer{

    public function transformDetail($model) {
        return [
            'id' => $model->id,
            'thn_periode_keg' => $model->thn_periode_keg,
            'lokasi_kode' => $model->lokasi_kode,
            'nama_propinsi' => $model->nama_propinsi,
            'nama_kabupatenkota' => $model->nama_kabupatenkota,
            'propinsi_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_propinsi : null,
            'kota_id' => !empty($model->lokasi) ? $model->lokasi->lokasi_kabupatenkota : null,
            'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
'luas_wilayah_km' => $model->luas_wilayah_km,
'a41_1_pengembangan_peningkatan_fungsi' => $model->a41_1_pengembangan_peningkatan_fungsi,
'a41_2_pengembangan_baru' => $model->a41_2_pengembangan_baru,
'a41_3_revitalisasi_kota_yg_telah_berfungsi' => $model->a41_3_revitalisasi_kota_yg_telah_berfungsi,
'a42_mendorong_pengembangan_kota_sentra_produksi' => $model->a42_mendorong_pengembangan_kota_sentra_produksi,
'a43_1_pengembangan_peningkatan_fungsi' => $model->a43_1_pengembangan_peningkatan_fungsi,
'a43_2_pengembangan_baru' => $model->a43_2_pengembangan_baru,
'a43_3_revitalisasi_kota_yg_telah_berfungsi' => $model->a43_3_revitalisasi_kota_yg_telah_berfungsi,
'a44_1_rehabilitasi_kota_akibat_bencana_alam' => $model->a44_1_rehabilitasi_kota_akibat_bencana_alam,
'a44_2_pengendalian_mitigasi_bencana' => $model->a44_2_pengendalian_mitigasi_bencana,
'a51_lima_kws_metropolitan_br' => $model->a51_lima_kws_metropolitan_br,
'a52_tujuh_kws_perkotaan_metropolitan' => $model->a52_tujuh_kws_perkotaan_metropolitan,
'a53_duapuluh_kota_otonom' => $model->a53_duapuluh_kota_otonom,
'a54_sepuluh_kota_baru_publik' => $model->a54_sepuluh_kota_baru_publik,
'a61_nama_kspn' => $model->a61_nama_kspn,
'a62_nama_kspn' => $model->a62_nama_kspn,
'a63_nama_kspn' => $model->a63_nama_kspn,
'a64_nama_kspn' => $model->a64_nama_kspn,
'a65_nama_kspn' => $model->a65_nama_kspn,
'a66_nama_kspn' => $model->a66_nama_kspn,
'a67_nama_kspn' => $model->a67_nama_kspn,
'a68_nama_kspn' => $model->a68_nama_kspn,
'a69_nama_kspn' => $model->a69_nama_kspn,
'a70_nama_kspn' => $model->a70_nama_kspn,
'a71_nama_kspn' => $model->a71_nama_kspn,
'a72_nama_kspn' => $model->a72_nama_kspn,
'a71_indeks_resiko_bencana' => $model->a71_indeks_resiko_bencana,
'a72_1_resiko_tinggi' => $model->a72_1_resiko_tinggi,
'a72_2_resiko_sedang' => $model->a72_2_resiko_sedang,
'a72_3_resiko_rendah' => $model->a72_3_resiko_rendah,
'a73_1_banjir' => $model->a73_1_banjir,
'a73_2_gempa_bumi' => $model->a73_2_gempa_bumi,
'a73_3_kebakaran' => $model->a73_3_kebakaran,
'a73_4_tanah_longsor' => $model->a73_4_tanah_longsor,
'a73_5_tsunami' => $model->a73_5_tsunami,
'a73_6_banjir_bandang' => $model->a73_6_banjir_bandang,
'a73_7_kekeringan' => $model->a73_7_kekeringan,
'jml_penduduk_kota_2014' => $model->jml_penduduk_kota_2014,
'jml_penduduk_kota_2015' => $model->jml_penduduk_kota_2015,
'jml_penduduk_kota_2016' => $model->jml_penduduk_kota_2016,
'jml_penduduk_kota_2017' => $model->jml_penduduk_kota_2017,
'jml_penduduk_kota_2018' => $model->jml_penduduk_kota_2018,
'jml_penduduk_desa_2014' => $model->jml_penduduk_desa_2014,
'jml_penduduk_desa_2015' => $model->jml_penduduk_desa_2015,
'jml_penduduk_desa_2016' => $model->jml_penduduk_desa_2016,
'jml_penduduk_desa_2017' => $model->jml_penduduk_desa_2017,
'jml_penduduk_desa_2018' => $model->jml_penduduk_desa_2018,

            'is_actived' => $model->is_actived
        ];
    }

    public function transformPaginate($model) {

        $data = $model->getCollection()->transform(function($model, $key) {
            return [
                'id' => $model->id,
                'thn_periode_keg' => $model->thn_periode_keg,
                'lokasi_kode' => $model->lokasi_kode,
                'nama_propinsi' => $model->nama_propinsi,
                'nama_kabupatenkota' => $model->nama_kabupatenkota,
                'klasifikasi_berdasarkan_sasaran_utama' => $model->klasifikasi_berdasarkan_sasaran_utama,
'luas_wilayah_km' => $model->luas_wilayah_km,
'a41_1_pengembangan_peningkatan_fungsi' => $model->a41_1_pengembangan_peningkatan_fungsi,
'a41_2_pengembangan_baru' => $model->a41_2_pengembangan_baru,
'a41_3_revitalisasi_kota_yg_telah_berfungsi' => $model->a41_3_revitalisasi_kota_yg_telah_berfungsi,
'a42_mendorong_pengembangan_kota_sentra_produksi' => $model->a42_mendorong_pengembangan_kota_sentra_produksi,
'a43_1_pengembangan_peningkatan_fungsi' => $model->a43_1_pengembangan_peningkatan_fungsi,
'a43_2_pengembangan_baru' => $model->a43_2_pengembangan_baru,
'a43_3_revitalisasi_kota_yg_telah_berfungsi' => $model->a43_3_revitalisasi_kota_yg_telah_berfungsi,
'a44_1_rehabilitasi_kota_akibat_bencana_alam' => $model->a44_1_rehabilitasi_kota_akibat_bencana_alam,
'a44_2_pengendalian_mitigasi_bencana' => $model->a44_2_pengendalian_mitigasi_bencana,
'a51_lima_kws_metropolitan_br' => $model->a51_lima_kws_metropolitan_br,
'a52_tujuh_kws_perkotaan_metropolitan' => $model->a52_tujuh_kws_perkotaan_metropolitan,
'a53_duapuluh_kota_otonom' => $model->a53_duapuluh_kota_otonom,
'a54_sepuluh_kota_baru_publik' => $model->a54_sepuluh_kota_baru_publik,
'a61_nama_kspn' => $model->a61_nama_kspn,
'a62_nama_kspn' => $model->a62_nama_kspn,
'a63_nama_kspn' => $model->a63_nama_kspn,
'a64_nama_kspn' => $model->a64_nama_kspn,
'a65_nama_kspn' => $model->a65_nama_kspn,
'a66_nama_kspn' => $model->a66_nama_kspn,
'a67_nama_kspn' => $model->a67_nama_kspn,
'a68_nama_kspn' => $model->a68_nama_kspn,
'a69_nama_kspn' => $model->a69_nama_kspn,
'a70_nama_kspn' => $model->a70_nama_kspn,
'a71_nama_kspn' => $model->a71_nama_kspn,
'a72_nama_kspn' => $model->a72_nama_kspn,
'a71_indeks_resiko_bencana' => $model->a71_indeks_resiko_bencana,
'a72_1_resiko_tinggi' => $model->a72_1_resiko_tinggi,
'a72_2_resiko_sedang' => $model->a72_2_resiko_sedang,
'a72_3_resiko_rendah' => $model->a72_3_resiko_rendah,
'a73_1_banjir' => $model->a73_1_banjir,
'a73_2_gempa_bumi' => $model->a73_2_gempa_bumi,
'a73_3_kebakaran' => $model->a73_3_kebakaran,
'a73_4_tanah_longsor' => $model->a73_4_tanah_longsor,
'a73_5_tsunami' => $model->a73_5_tsunami,
'a73_6_banjir_bandang' => $model->a73_6_banjir_bandang,
'a73_7_kekeringan' => $model->a73_7_kekeringan,
'jml_penduduk_kota_2014' => $model->jml_penduduk_kota_2014,
'jml_penduduk_kota_2015' => $model->jml_penduduk_kota_2015,
'jml_penduduk_kota_2016' => $model->jml_penduduk_kota_2016,
'jml_penduduk_kota_2017' => $model->jml_penduduk_kota_2017,
'jml_penduduk_kota_2018' => $model->jml_penduduk_kota_2018,
'jml_penduduk_desa_2014' => $model->jml_penduduk_desa_2014,
'jml_penduduk_desa_2015' => $model->jml_penduduk_desa_2015,
'jml_penduduk_desa_2016' => $model->jml_penduduk_desa_2016,
'jml_penduduk_desa_2017' => $model->jml_penduduk_desa_2017,
'jml_penduduk_desa_2018' => $model->jml_penduduk_desa_2018,

                'is_actived' => $model->is_actived
            ];
        });

        $result = [
            'totalRow' => $model->total(),
            'perPage' => $model->count(),
            'currentPage' => $model->currentPage(),
            'lastPage' => $model->lastPage(),
            'data' => $data,
        ];

        return $result;
    }
}
