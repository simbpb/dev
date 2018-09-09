@extends('layouts.app')
@section('title', 'Tabg')

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
                                <label>Nama Lengkap</label>
                                <div class="form-group"><b>{!! $model['nama_lengkap'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Keahlian</label>
                                <div class="form-group"><b>{!! $model['keahlian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Sk Pengangkatan</label>
                                <div class="form-group"><b>{!! $model['sk_pengangkatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Masa Tugas</label>
                                <div class="form-group"><b>{!! $model['masa_tugas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Upload Sk Pengangkatan</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_upload_sk_pengangkatan'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Fungsi Bg Terdata Dan Imb</label>
                                <div class="form-group"><b>{!! $model['fungsi_bg_terdata_dan_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Bg Terdata Dan Imb</label>
                                <div class="form-group"><b>{!! $model['tipe_bg_terdata_dan_imb'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Nama Pemilik Bg Terdata Imb</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_bg_terdata_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lok Bg Terdata Imb</label>
                                <div class="form-group"><b>{!! $model['lok_bg_terdata_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Fungsi Bg Terdata Dan Slf</label>
                                <div class="form-group"><b>{!! $model['fungsi_bg_terdata_dan_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tipe Bg Terdata Dan Slf</label>
                                <div class="form-group"><b>{!! $model['tipe_bg_terdata_dan_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pemilik Bg Terdata Slf</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_bg_terdata_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lok Bg Terdata Slf</label>
                                <div class="form-group"><b>{!! $model['lok_bg_terdata_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Imb Bg Didampingi Tabg</label>
                                <div class="form-group"><b>{!! $model['no_imb_bg_didampingi_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Slf Bg Didampingi Tabg</label>
                                <div class="form-group"><b>{!! $model['no_slf_bg_didampingi_tabg'] !!}</b></div>
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