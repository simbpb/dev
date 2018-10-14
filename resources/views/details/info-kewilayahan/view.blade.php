@extends('layouts.app')
@section('title', 'Info Kewilayahan')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-grid3 position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/details/'.$path) }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> Rincian  
	           </h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
            	<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
				    		<label>Tahun Periode Kegiatan</label>
				    		<div class="form-group"><b>{!! $model['thn_periode_keg'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Kode Lokasi</label>
				    		<div class="form-group"><b>{!! $model['lokasi_kode'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Propinsi</label>
				    		<div class="form-group"><b>{!! $model['nama_propinsi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Kabupaten/Kota</label>
				    		<div class="form-group"><b>{!! $model['nama_kabupatenkota'] !!}</b></div>
				  		</div>
				  		
                            <div class="form-group">
                                <label>Klasifikasi Berdasarkan Sasaran Utama</label>
                                <div class="form-group"><b>{!! $model['klasifikasi_berdasarkan_sasaran_utama'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Wilayah Km</label>
                                <div class="form-group"><b>{!! $model['luas_wilayah_km'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A41 1 Pengembangan Peningkatan Fungsi</label>
                                <div class="form-group"><b>{!! $model['a41_1_pengembangan_peningkatan_fungsi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A41 2 Pengembangan Baru</label>
                                <div class="form-group"><b>{!! $model['a41_2_pengembangan_baru'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A41 3 Revitalisasi Kota Yg Telah Berfungsi</label>
                                <div class="form-group"><b>{!! $model['a41_3_revitalisasi_kota_yg_telah_berfungsi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A42 Mendorong Pengembangan Kota Sentra Produksi</label>
                                <div class="form-group"><b>{!! $model['a42_mendorong_pengembangan_kota_sentra_produksi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A43 1 Pengembangan Peningkatan Fungsi</label>
                                <div class="form-group"><b>{!! $model['a43_1_pengembangan_peningkatan_fungsi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A43 2 Pengembangan Baru</label>
                                <div class="form-group"><b>{!! $model['a43_2_pengembangan_baru'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A43 3 Revitalisasi Kota Yg Telah Berfungsi</label>
                                <div class="form-group"><b>{!! $model['a43_3_revitalisasi_kota_yg_telah_berfungsi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A44 1 Rehabilitasi Kota Akibat Bencana Alam</label>
                                <div class="form-group"><b>{!! $model['a44_1_rehabilitasi_kota_akibat_bencana_alam'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A44 2 Pengendalian Mitigasi Bencana</label>
                                <div class="form-group"><b>{!! $model['a44_2_pengendalian_mitigasi_bencana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A51 Lima Kws Metropolitan Br</label>
                                <div class="form-group"><b>{!! $model['a51_lima_kws_metropolitan_br'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A52 Tujuh Kws Perkotaan Metropolitan</label>
                                <div class="form-group"><b>{!! $model['a52_tujuh_kws_perkotaan_metropolitan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A53 Duapuluh Kota Otonom</label>
                                <div class="form-group"><b>{!! $model['a53_duapuluh_kota_otonom'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A54 Sepuluh Kota Baru Publik</label>
                                <div class="form-group"><b>{!! $model['a54_sepuluh_kota_baru_publik'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A61 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a61_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A62 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a62_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A63 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a63_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A64 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a64_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A65 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a65_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A66 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a66_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A67 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a67_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A68 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a68_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A69 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a69_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A70 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a70_nama_kspn'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>A71 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a71_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A72 Nama Kspn</label>
                                <div class="form-group"><b>{!! $model['a72_nama_kspn'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A71 Indeks Resiko Bencana</label>
                                <div class="form-group"><b>{!! $model['a71_indeks_resiko_bencana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A72 1 Resiko Tinggi</label>
                                <div class="form-group"><b>{!! $model['a72_1_resiko_tinggi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A72 2 Resiko Sedang</label>
                                <div class="form-group"><b>{!! $model['a72_2_resiko_sedang'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A72 3 Resiko Rendah</label>
                                <div class="form-group"><b>{!! $model['a72_3_resiko_rendah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 1 Banjir</label>
                                <div class="form-group"><b>{!! $model['a73_1_banjir'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 2 Gempa Bumi</label>
                                <div class="form-group"><b>{!! $model['a73_2_gempa_bumi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 3 Kebakaran</label>
                                <div class="form-group"><b>{!! $model['a73_3_kebakaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 4 Tanah Longsor</label>
                                <div class="form-group"><b>{!! $model['a73_4_tanah_longsor'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 5 Tsunami</label>
                                <div class="form-group"><b>{!! $model['a73_5_tsunami'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 6 Banjir Bandang</label>
                                <div class="form-group"><b>{!! $model['a73_6_banjir_bandang'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>A73 7 Kekeringan</label>
                                <div class="form-group"><b>{!! $model['a73_7_kekeringan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Kota 2014</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_kota_2014'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Kota 2015</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_kota_2015'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Kota 2016</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_kota_2016'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Kota 2017</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_kota_2017'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Kota 2018</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_kota_2018'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Desa 2014</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_desa_2014'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Desa 2015</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_desa_2015'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Desa 2016</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_desa_2016'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Desa 2017</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_desa_2017'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Penduduk Desa 2018</label>
                                <div class="form-group"><b>{!! $model['jml_penduduk_desa_2018'] !!}</b></div>
                            </div>

				  		<div class="form-group">
				    		<label>Status</label>
				    		<div class="form-group"><b>{!! (!empty($model['is_actived'])) ? 'ACTIVE' : 'INACTIVE' !!}</b></div>
				  		</div>
				  	</div>
			  	</div>
			  	<div class="text-right">
					<button class="btn btn-warning" type="button" onclick="history.back();"><i class="icon-undo2"></i> Kembali</button>
				</div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection