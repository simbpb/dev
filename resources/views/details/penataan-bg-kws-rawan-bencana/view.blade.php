@extends('layouts.app')
@section('title', 'Penataan Bg Kws Rawan Bencana')

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
                                <label>Indeks Resiko</label>
                                <div class="form-group"><b>{!! $model['indeks_resiko'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tingkat Resiko</label>
                                <div class="form-group"><b>{!! $model['tingkat_resiko'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Risiko Bencana Dominan</label>
                                <div class="form-group"><b>{!! $model['Risiko_Bencana_Dominan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Struktur Ruang</label>
                                <div class="form-group"><b>{!! $model['struktur_ruang'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <div class="form-group"><b>{!! $model['Nama_Kegiatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tahun Anggaran</label>
                                <div class="form-group"><b>{!! $model['Tahun_Anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Sumber Pendanaan</label>
                                <div class="form-group"><b>{!! $model['Sumber_Pendanaan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alokasi Anggaran</label>
                                <div class="form-group"><b>{!! $model['Alokasi_Anggaran'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Volume Pekerjaan</label>
                                <div class="form-group"><b>{!! $model['Volume_Pekerjaan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Instansi Unit</label>
                                <div class="form-group"><b>{!! $model['Instansi_Unit'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kegiatan</label>
                                <div class="form-group"><b>{!! $model['Lokasi_Kegiatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Lat</label>
                                <div class="form-group"><b>{!! $model['Titik_koordinat_lat'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Titik Koordinat Log</label>
                                <div class="form-group"><b>{!! $model['Titik_koordinat_log'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Status Aset</label>
                                <div class="form-group"><b>{!! $model['Status_Aset'] !!}</b></div>
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