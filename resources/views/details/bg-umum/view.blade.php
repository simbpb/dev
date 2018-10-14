@extends('layouts.app')
@section('title', 'Bg Umum')

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
                                <label>Nama Pemilik Bangunan</label>
                                <div class="form-group"><b>{!! $model['nama_pemilik_bangunan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Ktp Pemilik Bangunan</label>
                                <div class="form-group"><b>{!! $model['no_ktp_pemilik_bangunan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Bangunan</label>
                                <div class="form-group"><b>{!! $model['alamat_bangunan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Fungsi Bangunan</label>
                                <div class="form-group"><b>{!! $model['fungsi_bangunan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Memiliki Imb</label>
                                <div class="form-group"><b>{!! $model['memiliki_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Imb</label>
                                <div class="form-group"><b>{!! $model['no_imb'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Imb</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_imb'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Memiliki Slf</label>
                                <div class="form-group"><b>{!! $model['memiliki_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Slf</label>
                                <div class="form-group"><b>{!! $model['no_slf'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Slf</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_slf'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Tingkat Kompleksitas</label>
                                <div class="form-group"><b>{!! $model['tingkat_kompleksitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tingkat Permanensi</label>
                                <div class="form-group"><b>{!! $model['tingkat_permanensi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tingkat Risiko Kebakaran</label>
                                <div class="form-group"><b>{!! $model['tingkat_risiko_kebakaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Zona Gempa</label>
                                <div class="form-group"><b>{!! $model['zona_gempa'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Lokasi</label>
                                <div class="form-group"><b>{!! $model['kategori_lokasi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kategori Ketinggian</label>
                                <div class="form-group"><b>{!! $model['kategori_ketinggian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Kepemilikan</label>
                                <div class="form-group"><b>{!! $model['kepemilikan'] !!}</b></div>
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