@extends('layouts.app')
@section('title', 'Rehab Bg Pusaka Istana')

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
                                <label>Thn Anggaran</label>
                                <div class="form-group"><b>{!! $model['thn_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Sumber Anggaran</label>
                                <div class="form-group"><b>{!! $model['sumber_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alokasi Anggaran</label>
                                <div class="form-group"><b>{!! $model['alokasi_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Volume Pekerjaan</label>
                                <div class="form-group"><b>{!! $model['volume_pekerjaan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Instansi Unit Organisasi Pelaksana</label>
                                <div class="form-group"><b>{!! $model['instansi_unit_organisasi_pelaksana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kegiatan Proyek</label>
                                <div class="form-group"><b>{!! $model['lokasi_kegiatan_proyek'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat</label>
                                <div class="form-group"><b>{!! $model['titik_koordinat'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Status Aset</label>
                                <div class="form-group"><b>{!! $model['status_aset'] !!}</b></div>
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