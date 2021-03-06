@extends('layouts.app')
@section('title', 'Aktivitas Pembangunan Bangunan Gedung Hijau')

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
                                <label>Nama Kegiatan</label>
                                <div class="form-group"><b>{!! $model['nama_kegiatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tahun Anggaran</label>
                                <div class="form-group"><b>{!! $model['thn_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Sumber Anggaran</label>
                                <div class="form-group"><b>{!! $model['sumber_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alokasi Anggaran Rp. (1.000)</label>
                                <div class="form-group"><b>{!! $model['alokasi_anggaran'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Volume Pekerjaan (m<sup>2</sup>)</label>
                                <div class="form-group"><b>{!! $model['volume_pekerjaan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Instansi/ Unit Organisasi Pelaksan</label>
                                <div class="form-group"><b>{!! $model['instansi_unit_organisasi_pelaksana'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kegiatan Proyek</label>
                                <div class="form-group"><b>{!! $model['lokasi_kegiatan_proyek'] !!}</b></div>
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
                                <label>Status Aset</label>
                                <div class="form-group"><b>{!! $model['status_aset'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Kepala Dinas</label>
                                <div class="form-group"><b>{!! $model['nama_kepala_dinas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pengelola</label>
                                <div class="form-group"><b>{!! $model['nama_pengelola'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Nama Penyedia Jasa Perencanaan</label>
                                <div class="form-group"><b>{!! $model['nama_penyedia_jasa_perencanaan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Thn Penerbitan Sertifikat Bangunan Gedung Hijau (BGH)</label>
                                <div class="form-group"><b>{!! $model['thn_penerbitan_sertifikat_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Sertifikat BGH</label>
                                <div class="form-group"><b>{!! $model['no_sertifikat_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Upload Sertifikat BGH</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_upload_sertifikat_bgh'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>No Plakat BGH</label>
                                <div class="form-group"><b>{!! $model['no_plakat_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Thn Penerbitan Sertifikat Pemanfaatan BGH</label>
                                <div class="form-group"><b>{!! $model['thn_penerbitan_sertifikat_pemanfaatan_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Upload Sertifikat Pemanfaatan BGH</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_upload_sertifikat_pemanfaatan_bgh'] !!}">
                                    <i class="icon-file-download2"></i>
                                    Download File</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Peringkat BGH</label>
                                <div class="form-group"><b>{!! $model['peringkat_bgh'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pemanfaatan Ke</label>
                                <div class="form-group"><b>{!! $model['pemanfaatan_ke'] !!}</b></div>
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
