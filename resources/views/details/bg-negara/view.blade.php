@extends('layouts.app')
@section('title', 'DATA BANGUNAN GEDUNG NEGARA')

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
				    		<label>Nama Propinsi</label>
				    		<div class="form-group"><b>{!! $model['nama_propinsi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Kabupaten/Kota</label>
				    		<div class="form-group"><b>{!! $model['nama_kabupatenkota'] !!}</b></div>
				  		</div>
				  		
                            <div class="form-group">
                                <label>Nama Bangunan Gedung Negara</label>
                                <div class="form-group"><b>{!! $model['nama_bg_negara'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Instansi Pemilik Bangunan Gedung Negara</label>
                                <div class="form-group"><b>{!! $model['instansi_pemilik_bg_negara'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Bangunan Gedung Negara</label>
                                <div class="form-group"><b>{!! $model['alamat_bg_negara'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Bangunan Gedung Negara m<sup>2</sup></label>
                                <div class="form-group"><b>{!! $model['luas_bg_negara_m2'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Lat</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_lat'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Titik Koordinat Long</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_long'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Dokumentasi</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['dokumentasi'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

				  		<div class="form-group">
				    		<label>Status</label>
				    		<div class="form-group"><b>{!! (!empty($model['is_actived'])) ? 'ACTIVE' : 'INACTIVE' !!}</b></div>
				  		</div>
              <div class="form-group">
                <label>Last Update</label>
                <div class="form-group"><b>{!! $model['updated_at'] !!}</b></div>
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
