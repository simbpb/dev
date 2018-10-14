@extends('layouts.app')
@section('title', 'Pengelola Teknis Bersertifikasi')

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
                                <label>No Sertifikat Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['No_sertifikat_pengelola_teknis'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Sertifikat Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['Tgl_sertifikat_pengelola_teknis'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pejabat</label>
                                <div class="form-group"><b>{!! $model['Nama_Pejabat'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <div class="form-group"><b>{!! $model['Jabatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['Nama_pengelola_teknis'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No KTP Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['No_KTP_pengelola_teknis'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Dinas Instansi Asal Unit Org</label>
                                <div class="form-group"><b>{!! $model['Dinas_Instansi_asal_Unit_org'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Lengkap Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['Alamat_lengkap_pengelola_teknis'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Pendidikan Terakhir Pengelola Teknis</label>
                                <div class="form-group"><b>{!! $model['Pendidikan_terakhir_pengelola_teknis'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jurusan Pendidikan Terakhir</label>
                                <div class="form-group"><b>{!! $model['Jurusan_Pendidikan_terakhir'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Asal Universitas</label>
                                <div class="form-group"><b>{!! $model['Asal_Universitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Bidang Keahlian</label>
                                <div class="form-group"><b>{!! $model['Bidang_Keahlian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="form-group"><b>{!! $model['Keterangan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Sertifikat Pengelola Teknis</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_Sertifikat_pengelola_teknis'] !!}">
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