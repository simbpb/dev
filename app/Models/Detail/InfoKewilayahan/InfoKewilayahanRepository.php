<?php
namespace App\Models\Detail\InfoKewilayahan;

use DB;
use File;
use App\Helpers\Location;
use App\Models\Program\ProgramRepository;

class InfoKewilayahanRepository
{

    protected $model;
    protected $program;
    
      
    public function __construct(
        InfoKewilayahan $model,
        ProgramRepository $program
    ) {
        $this->model = $model;
        $this->program = $program;
    }

    public function list($request)
    {
        $limit = !empty($request['limit']) ? $request['limit'] : 10;
     
        $model = $this->model->select(
                        'tbl_detail_info_kewilayahan.id',
                        'tbl_detail_info_kewilayahan.thn_periode_keg',
                        'tbl_detail_info_kewilayahan.lokasi_kode',
                        'tbl_detail_info_kewilayahan.nama_propinsi',
                        'tbl_detail_info_kewilayahan.nama_kabupatenkota',
                        'tbl_detail_info_kewilayahan.klasifikasi_berdasarkan_sasaran_utama',
						'tbl_detail_info_kewilayahan.luas_wilayah_km',
						'tbl_detail_info_kewilayahan.a41_1_pengembangan_peningkatan_fungsi',
						'tbl_detail_info_kewilayahan.a41_2_pengembangan_baru',
						'tbl_detail_info_kewilayahan.a41_3_revitalisasi_kota_yg_telah_berfungsi',
						'tbl_detail_info_kewilayahan.a42_mendorong_pengembangan_kota_sentra_produksi',
						'tbl_detail_info_kewilayahan.a43_1_pengembangan_peningkatan_fungsi',
						'tbl_detail_info_kewilayahan.a43_2_pengembangan_baru',
						'tbl_detail_info_kewilayahan.a43_3_revitalisasi_kota_yg_telah_berfungsi',
						'tbl_detail_info_kewilayahan.a44_1_rehabilitasi_kota_akibat_bencana_alam',
						'tbl_detail_info_kewilayahan.a44_2_pengendalian_mitigasi_bencana',
						'tbl_detail_info_kewilayahan.a51_lima_kws_metropolitan_br',
						'tbl_detail_info_kewilayahan.a52_tujuh_kws_perkotaan_metropolitan',
						'tbl_detail_info_kewilayahan.a53_duapuluh_kota_otonom',
						'tbl_detail_info_kewilayahan.a54_sepuluh_kota_baru_publik',
						'tbl_detail_info_kewilayahan.a61_nama_kspn',
						'tbl_detail_info_kewilayahan.a62_nama_kspn',
						'tbl_detail_info_kewilayahan.a63_nama_kspn',
						'tbl_detail_info_kewilayahan.a64_nama_kspn',
						'tbl_detail_info_kewilayahan.a65_nama_kspn',
						'tbl_detail_info_kewilayahan.a66_nama_kspn',
						'tbl_detail_info_kewilayahan.a67_nama_kspn',
						'tbl_detail_info_kewilayahan.a68_nama_kspn',
						'tbl_detail_info_kewilayahan.a69_nama_kspn',
						'tbl_detail_info_kewilayahan.a70_nama_kspn',
						'tbl_detail_info_kewilayahan.a71_nama_kspn',
						'tbl_detail_info_kewilayahan.a72_nama_kspn',
						'tbl_detail_info_kewilayahan.a71_indeks_resiko_bencana',
						'tbl_detail_info_kewilayahan.a72_1_resiko_tinggi',
						'tbl_detail_info_kewilayahan.a72_2_resiko_sedang',
						'tbl_detail_info_kewilayahan.a72_3_resiko_rendah',
						'tbl_detail_info_kewilayahan.a73_1_banjir',
						'tbl_detail_info_kewilayahan.a73_2_gempa_bumi',
						'tbl_detail_info_kewilayahan.a73_3_kebakaran',
						'tbl_detail_info_kewilayahan.a73_4_tanah_longsor',
						'tbl_detail_info_kewilayahan.a73_5_tsunami',
						'tbl_detail_info_kewilayahan.a73_6_banjir_bandang',
						'tbl_detail_info_kewilayahan.a73_7_kekeringan',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2014',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2015',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2016',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2017',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2018',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2014',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2015',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2016',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2017',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2018',
                        'tbl_detail_info_kewilayahan.is_actived'
                    )->searchOrder($request, [
                        'tbl_detail_info_kewilayahan.thn_periode_keg',
                        'tbl_detail_info_kewilayahan.lokasi_kode',
                        'tbl_detail_info_kewilayahan.nama_propinsi',
                        'tbl_detail_info_kewilayahan.nama_kabupatenkota',
                        'tbl_detail_info_kewilayahan.klasifikasi_berdasarkan_sasaran_utama',
						'tbl_detail_info_kewilayahan.luas_wilayah_km',
						'tbl_detail_info_kewilayahan.a41_1_pengembangan_peningkatan_fungsi',
						'tbl_detail_info_kewilayahan.a41_2_pengembangan_baru',
						'tbl_detail_info_kewilayahan.a41_3_revitalisasi_kota_yg_telah_berfungsi',
						'tbl_detail_info_kewilayahan.a42_mendorong_pengembangan_kota_sentra_produksi',
						'tbl_detail_info_kewilayahan.a43_1_pengembangan_peningkatan_fungsi',
						'tbl_detail_info_kewilayahan.a43_2_pengembangan_baru',
						'tbl_detail_info_kewilayahan.a43_3_revitalisasi_kota_yg_telah_berfungsi',
						'tbl_detail_info_kewilayahan.a44_1_rehabilitasi_kota_akibat_bencana_alam',
						'tbl_detail_info_kewilayahan.a44_2_pengendalian_mitigasi_bencana',
						'tbl_detail_info_kewilayahan.a51_lima_kws_metropolitan_br',
						'tbl_detail_info_kewilayahan.a52_tujuh_kws_perkotaan_metropolitan',
						'tbl_detail_info_kewilayahan.a53_duapuluh_kota_otonom',
						'tbl_detail_info_kewilayahan.a54_sepuluh_kota_baru_publik',
						'tbl_detail_info_kewilayahan.a61_nama_kspn',
						'tbl_detail_info_kewilayahan.a62_nama_kspn',
						'tbl_detail_info_kewilayahan.a63_nama_kspn',
						'tbl_detail_info_kewilayahan.a64_nama_kspn',
						'tbl_detail_info_kewilayahan.a65_nama_kspn',
						'tbl_detail_info_kewilayahan.a66_nama_kspn',
						'tbl_detail_info_kewilayahan.a67_nama_kspn',
						'tbl_detail_info_kewilayahan.a68_nama_kspn',
						'tbl_detail_info_kewilayahan.a69_nama_kspn',
						'tbl_detail_info_kewilayahan.a70_nama_kspn',
						'tbl_detail_info_kewilayahan.a71_nama_kspn',
						'tbl_detail_info_kewilayahan.a72_nama_kspn',
						'tbl_detail_info_kewilayahan.a71_indeks_resiko_bencana',
						'tbl_detail_info_kewilayahan.a72_1_resiko_tinggi',
						'tbl_detail_info_kewilayahan.a72_2_resiko_sedang',
						'tbl_detail_info_kewilayahan.a72_3_resiko_rendah',
						'tbl_detail_info_kewilayahan.a73_1_banjir',
						'tbl_detail_info_kewilayahan.a73_2_gempa_bumi',
						'tbl_detail_info_kewilayahan.a73_3_kebakaran',
						'tbl_detail_info_kewilayahan.a73_4_tanah_longsor',
						'tbl_detail_info_kewilayahan.a73_5_tsunami',
						'tbl_detail_info_kewilayahan.a73_6_banjir_bandang',
						'tbl_detail_info_kewilayahan.a73_7_kekeringan',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2014',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2015',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2016',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2017',
						'tbl_detail_info_kewilayahan.jml_penduduk_kota_2018',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2014',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2015',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2016',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2017',
						'tbl_detail_info_kewilayahan.jml_penduduk_desa_2018',
                        'tbl_detail_info_kewilayahan.is_actived'
                    ])
                    ->filterLocation()
                    ->paginate($limit);

        return (new InfoKewilayahanTransformer)->transformPaginate($model);
    }

    public function find($id)
    {
        $model = $this->model->find($id);
        return (new InfoKewilayahanTransformer)->transformDetail($model);
    }
     
    public function create($request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $prog = $this->program->find($request->input('program_id'));
        $model = $this->model;

        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
        $model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
$model->luas_wilayah_km = $request->input('luas_wilayah_km');
$model->a41_1_pengembangan_peningkatan_fungsi = $request->input('a41_1_pengembangan_peningkatan_fungsi');
$model->a41_2_pengembangan_baru = $request->input('a41_2_pengembangan_baru');
$model->a41_3_revitalisasi_kota_yg_telah_berfungsi = $request->input('a41_3_revitalisasi_kota_yg_telah_berfungsi');
$model->a42_mendorong_pengembangan_kota_sentra_produksi = $request->input('a42_mendorong_pengembangan_kota_sentra_produksi');
$model->a43_1_pengembangan_peningkatan_fungsi = $request->input('a43_1_pengembangan_peningkatan_fungsi');
$model->a43_2_pengembangan_baru = $request->input('a43_2_pengembangan_baru');
$model->a43_3_revitalisasi_kota_yg_telah_berfungsi = $request->input('a43_3_revitalisasi_kota_yg_telah_berfungsi');
$model->a44_1_rehabilitasi_kota_akibat_bencana_alam = $request->input('a44_1_rehabilitasi_kota_akibat_bencana_alam');
$model->a44_2_pengendalian_mitigasi_bencana = $request->input('a44_2_pengendalian_mitigasi_bencana');
$model->a51_lima_kws_metropolitan_br = $request->input('a51_lima_kws_metropolitan_br');
$model->a52_tujuh_kws_perkotaan_metropolitan = $request->input('a52_tujuh_kws_perkotaan_metropolitan');
$model->a53_duapuluh_kota_otonom = $request->input('a53_duapuluh_kota_otonom');
$model->a54_sepuluh_kota_baru_publik = $request->input('a54_sepuluh_kota_baru_publik');
$model->a61_nama_kspn = $request->input('a61_nama_kspn');
$model->a62_nama_kspn = $request->input('a62_nama_kspn');
$model->a63_nama_kspn = $request->input('a63_nama_kspn');
$model->a64_nama_kspn = $request->input('a64_nama_kspn');
$model->a65_nama_kspn = $request->input('a65_nama_kspn');
$model->a66_nama_kspn = $request->input('a66_nama_kspn');
$model->a67_nama_kspn = $request->input('a67_nama_kspn');
$model->a68_nama_kspn = $request->input('a68_nama_kspn');
$model->a69_nama_kspn = $request->input('a69_nama_kspn');
$model->a70_nama_kspn = $request->input('a70_nama_kspn');
$model->a71_nama_kspn = $request->input('a71_nama_kspn');
$model->a72_nama_kspn = $request->input('a72_nama_kspn');
$model->a71_indeks_resiko_bencana = $request->input('a71_indeks_resiko_bencana');
$model->a72_1_resiko_tinggi = $request->input('a72_1_resiko_tinggi');
$model->a72_2_resiko_sedang = $request->input('a72_2_resiko_sedang');
$model->a72_3_resiko_rendah = $request->input('a72_3_resiko_rendah');
$model->a73_1_banjir = $request->input('a73_1_banjir');
$model->a73_2_gempa_bumi = $request->input('a73_2_gempa_bumi');
$model->a73_3_kebakaran = $request->input('a73_3_kebakaran');
$model->a73_4_tanah_longsor = $request->input('a73_4_tanah_longsor');
$model->a73_5_tsunami = $request->input('a73_5_tsunami');
$model->a73_6_banjir_bandang = $request->input('a73_6_banjir_bandang');
$model->a73_7_kekeringan = $request->input('a73_7_kekeringan');
$model->jml_penduduk_kota_2014 = $request->input('jml_penduduk_kota_2014');
$model->jml_penduduk_kota_2015 = $request->input('jml_penduduk_kota_2015');
$model->jml_penduduk_kota_2016 = $request->input('jml_penduduk_kota_2016');
$model->jml_penduduk_kota_2017 = $request->input('jml_penduduk_kota_2017');
$model->jml_penduduk_kota_2018 = $request->input('jml_penduduk_kota_2018');
$model->jml_penduduk_desa_2014 = $request->input('jml_penduduk_desa_2014');
$model->jml_penduduk_desa_2015 = $request->input('jml_penduduk_desa_2015');
$model->jml_penduduk_desa_2016 = $request->input('jml_penduduk_desa_2016');
$model->jml_penduduk_desa_2017 = $request->input('jml_penduduk_desa_2017');
$model->jml_penduduk_desa_2018 = $request->input('jml_penduduk_desa_2018');
        $model->is_actived = $request->input('status');
        $model->save();

        DB::commit();
        return true;
    }

    public function update($id, $request)
    {
        DB::beginTransaction();
        $lokasi = Location::getPropinsiKota($request->input('propinsi_id'), $request->input('kota_id'));
        $model = $this->model->find($id);
        
        

        $model->thn_periode_keg = $request->input('thn_periode_keg');
        $model->lokasi_kode = $lokasi->lokasi_kode;
        $model->nama_propinsi = $lokasi->nama_propinsi;
        $model->nama_kabupatenkota = $lokasi->nama_kabupatenkota;
        $model->renstra_id = $prog->renstra_id;
        $model->output_id = $prog->output_id;
        $model->suboutput_id = $prog->suboutput_id;
        $model->sasaran_id = $prog->sasaran_id;
        $model->uraian_id = $prog->uraian_id;
        $model->subdit_id = $prog->subdit_id;
        $model->volume_id = $prog->volume_id;
        $model->klasifikasi_berdasarkan_sasaran_utama = $request->input('klasifikasi_berdasarkan_sasaran_utama');
$model->luas_wilayah_km = $request->input('luas_wilayah_km');
$model->a41_1_pengembangan_peningkatan_fungsi = $request->input('a41_1_pengembangan_peningkatan_fungsi');
$model->a41_2_pengembangan_baru = $request->input('a41_2_pengembangan_baru');
$model->a41_3_revitalisasi_kota_yg_telah_berfungsi = $request->input('a41_3_revitalisasi_kota_yg_telah_berfungsi');
$model->a42_mendorong_pengembangan_kota_sentra_produksi = $request->input('a42_mendorong_pengembangan_kota_sentra_produksi');
$model->a43_1_pengembangan_peningkatan_fungsi = $request->input('a43_1_pengembangan_peningkatan_fungsi');
$model->a43_2_pengembangan_baru = $request->input('a43_2_pengembangan_baru');
$model->a43_3_revitalisasi_kota_yg_telah_berfungsi = $request->input('a43_3_revitalisasi_kota_yg_telah_berfungsi');
$model->a44_1_rehabilitasi_kota_akibat_bencana_alam = $request->input('a44_1_rehabilitasi_kota_akibat_bencana_alam');
$model->a44_2_pengendalian_mitigasi_bencana = $request->input('a44_2_pengendalian_mitigasi_bencana');
$model->a51_lima_kws_metropolitan_br = $request->input('a51_lima_kws_metropolitan_br');
$model->a52_tujuh_kws_perkotaan_metropolitan = $request->input('a52_tujuh_kws_perkotaan_metropolitan');
$model->a53_duapuluh_kota_otonom = $request->input('a53_duapuluh_kota_otonom');
$model->a54_sepuluh_kota_baru_publik = $request->input('a54_sepuluh_kota_baru_publik');
$model->a61_nama_kspn = $request->input('a61_nama_kspn');
$model->a62_nama_kspn = $request->input('a62_nama_kspn');
$model->a63_nama_kspn = $request->input('a63_nama_kspn');
$model->a64_nama_kspn = $request->input('a64_nama_kspn');
$model->a65_nama_kspn = $request->input('a65_nama_kspn');
$model->a66_nama_kspn = $request->input('a66_nama_kspn');
$model->a67_nama_kspn = $request->input('a67_nama_kspn');
$model->a68_nama_kspn = $request->input('a68_nama_kspn');
$model->a69_nama_kspn = $request->input('a69_nama_kspn');
$model->a70_nama_kspn = $request->input('a70_nama_kspn');
$model->a71_nama_kspn = $request->input('a71_nama_kspn');
$model->a72_nama_kspn = $request->input('a72_nama_kspn');
$model->a71_indeks_resiko_bencana = $request->input('a71_indeks_resiko_bencana');
$model->a72_1_resiko_tinggi = $request->input('a72_1_resiko_tinggi');
$model->a72_2_resiko_sedang = $request->input('a72_2_resiko_sedang');
$model->a72_3_resiko_rendah = $request->input('a72_3_resiko_rendah');
$model->a73_1_banjir = $request->input('a73_1_banjir');
$model->a73_2_gempa_bumi = $request->input('a73_2_gempa_bumi');
$model->a73_3_kebakaran = $request->input('a73_3_kebakaran');
$model->a73_4_tanah_longsor = $request->input('a73_4_tanah_longsor');
$model->a73_5_tsunami = $request->input('a73_5_tsunami');
$model->a73_6_banjir_bandang = $request->input('a73_6_banjir_bandang');
$model->a73_7_kekeringan = $request->input('a73_7_kekeringan');
$model->jml_penduduk_kota_2014 = $request->input('jml_penduduk_kota_2014');
$model->jml_penduduk_kota_2015 = $request->input('jml_penduduk_kota_2015');
$model->jml_penduduk_kota_2016 = $request->input('jml_penduduk_kota_2016');
$model->jml_penduduk_kota_2017 = $request->input('jml_penduduk_kota_2017');
$model->jml_penduduk_kota_2018 = $request->input('jml_penduduk_kota_2018');
$model->jml_penduduk_desa_2014 = $request->input('jml_penduduk_desa_2014');
$model->jml_penduduk_desa_2015 = $request->input('jml_penduduk_desa_2015');
$model->jml_penduduk_desa_2016 = $request->input('jml_penduduk_desa_2016');
$model->jml_penduduk_desa_2017 = $request->input('jml_penduduk_desa_2017');
$model->jml_penduduk_desa_2018 = $request->input('jml_penduduk_desa_2018');
        $model->is_actived = $request->input('status');
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