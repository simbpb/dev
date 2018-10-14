@extends('layouts.app')
@section('title', 'Rth Status Tigapuluhpersen')

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
                                <label>Luas Wilayah Kab Kota</label>
                                <div class="form-group"><b>{!! $model['luas_wilayah_kab_kota'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Wilayah Kab Kota</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_wilayah_kab_kota'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Bentuk Rth</label>
                                <div class="form-group"><b>{!! $model['bentuk_rth'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kawasan</label>
                                <div class="form-group"><b>{!! $model['nama_kawasan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kawasan</label>
                                <div class="form-group"><b>{!! $model['lokasi_kawasan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Lat</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_lat'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Long</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_long'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Kawasan</label>
                                <div class="form-group"><b>{!! $model['luas_kawasan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Kawasan</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_kawasan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Status Aset</label>
                                <div class="form-group"><b>{!! $model['status_aset'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Bentuk Rth Private</label>
                                <div class="form-group"><b>{!! $model['bentuk_rth_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kawasan Rth Private</label>
                                <div class="form-group"><b>{!! $model['nama_kawasan_rth_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kawasan Rth Private</label>
                                <div class="form-group"><b>{!! $model['lokasi_kawasan_rth_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Lat Rth Private</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_lat_rth_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Long Rth Private</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat_long_rth_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Kawasan Private</label>
                                <div class="form-group"><b>{!! $model['luas_kawasan_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Kawasan Private</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_kawasan_private'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Status Aset Private</label>
                                <div class="form-group"><b>{!! $model['status_aset_private'] !!}</b></div>
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