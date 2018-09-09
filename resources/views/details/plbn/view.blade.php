@extends('layouts.app')
@section('title', 'Plbn')

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
                                <label>Nama Kegiatan</label>
                                <div class="form-group"><b>{!! $model['nama_kegiatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Biaya Pelaksanaan Kontraktor</label>
                                <div class="form-group"><b>{!! $model['biaya_pelaksanaan_kontraktor'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Manajemen Konstruksi</label>
                                <div class="form-group"><b>{!! $model['manajemen_konstruksi'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rencana Keu</label>
                                <div class="form-group"><b>{!! $model['rencana_keu'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Rencana Fisik</label>
                                <div class="form-group"><b>{!! $model['rencana_fisik'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Realisasi Keu</label>
                                <div class="form-group"><b>{!! $model['realisasi_keu'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Realisasi Fisik</label>
                                <div class="form-group"><b>{!! $model['realisasi_fisik'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Permasalahan</label>
                                <div class="form-group"><b>{!! $model['permasalahan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tindak Lanjut</label>
                                <div class="form-group"><b>{!! $model['tindak_lanjut'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Dokumentasi</label>
                                <div class="form-group"><b>{!! $model['dokumentasi'] !!}</b></div>
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