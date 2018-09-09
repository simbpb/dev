@extends('layouts.app')
@section('title', 'Bg Slfke 1')

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
                                <label>No Perbub Perwal</label>
                                <div class="form-group"><b>{!! $model['no_perbub_perwal'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Penetapan Perbub Perwal</label>
                                <div class="form-group"><b>{!! $model['tgl_penetapan_perbub_perwal'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Upload Perbub Perwal</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_upload_perbub_perwal'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Imb</label>
                                <div class="form-group"><b>{!! $model['no_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Surat Krk</label>
                                <div class="form-group"><b>{!! $model['no_surat_krk'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Permohonan Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['nama_permohonan_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pemilik Perorangan Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_perorangan_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Id Pemilik Perorangan Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['id_pemilik_perorangan_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Id Pemilik Perorangan Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['jenis_id_pemilik_perorangan_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pemilik Badan Usaha Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_badan_usaha_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Akta Pendirian Badan Usaha Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['no_akta_pendirian_badan_usaha_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Institusi Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['nama_institusi_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Ikmn Pemerintah Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['no_ikmn_pemerintah_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Hdno Pemerintah Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['no_hdno_pemerintah_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Propinsi Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['propinsi_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kabkota Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['kabkota_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kec Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['kec_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kel Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['kel_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rt Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['rt_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rw Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['rw_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['alamat_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Telp Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['telp_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Email Pemilik Bg Slf Ke1</label>
                                <div class="form-group"><b>{!! $model['email_pemilik_bg_slf_ke1'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pemilik Tanah</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_tanah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Bukti Kepemilikan</label>
                                <div class="form-group"><b>{!! $model['no_bukti_kepemilikan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Bukti Kepemilikan</label>
                                <div class="form-group"><b>{!! $model['jenis_bukti_kepemilikan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Tanah</label>
                                <div class="form-group"><b>{!! $model['luas_tanah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Tanah</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_tanah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Fungsi Bg</label>
                                <div class="form-group"><b>{!! $model['fungsi_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jml Lantai Bg</label>
                                <div class="form-group"><b>{!! $model['jml_lantai_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Bg</label>
                                <div class="form-group"><b>{!! $model['luas_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Bg</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Lantai Basement</label>
                                <div class="form-group"><b>{!! $model['luas_lantai_basement'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Satuan Lantai Basement</label>
                                <div class="form-group"><b>{!! $model['satuan_lantai_basement'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Mulai Konstruksi</label>
                                <div class="form-group"><b>{!! $model['tgl_mulai_konstruksi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Selesai Konstruksi</label>
                                <div class="form-group"><b>{!! $model['tgl_selesai_konstruksi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nilai Bg Sesuai Rab</label>
                                <div class="form-group"><b>{!! $model['nilai_bg_sesuai_rab'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lat Bg</label>
                                <div class="form-group"><b>{!! $model['lat_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Long Bg</label>
                                <div class="form-group"><b>{!! $model['long_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tek Bg Rg Terbuka Hijau Pekarangan</label>
                                <div class="form-group"><b>{!! $model['tek_bg_rg_terbuka_hijau_pekarangan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tek Bg Limbah B3</label>
                                <div class="form-group"><b>{!! $model['tek_bg_limbah_b3'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tek Bg Memiliki Perangkat Penangkal Kebakaran</label>
                                <div class="form-group"><b>{!! $model['tek_bg_memiliki_perangkat_penangkal_kebakaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tek Jenis Sanitasi</label>
                                <div class="form-group"><b>{!! $model['tek_jenis_sanitasi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tek Bg Sumber Air</label>
                                <div class="form-group"><b>{!! $model['tek_bg_sumber_air'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Perencanaan Arsitektur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_perencanaan_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Perencanaan Arsitektur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_perencanaan_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pelaksana Arsitektur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pelaksana_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pelaksana Arsitektur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pelaksana_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pengawas Arsitektur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pengawas_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pengawas Arsitektur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pengawas_arsitektur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Perencanaan Struktur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_perencanaan_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Perencanaan Struktur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_perencanaan_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pelaksana Struktur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pelaksana_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pelaksana Struktur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pelaksana_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pengawas Struktur</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pengawas_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pengawas Struktur</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pengawas_struktur'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Perencanaan Utilitas</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_perencanaan_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Perencanaan Utilitas</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_perencanaan_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pelaksana Utilitas</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pelaksana_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pelaksana Utilitas</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pelaksana_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Penyedia Js Pengawas Utilitas</label>
                                <div class="form-group"><b>{!! $model['penyedia_js_pengawas_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Serti Js Pengawas Utilitas</label>
                                <div class="form-group"><b>{!! $model['no_serti_js_pengawas_utilitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Perpanjangan Slf Ke</label>
                                <div class="form-group"><b>{!! $model['perpanjangan_slf_ke'] !!}</b></div>
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