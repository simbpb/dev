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
				    		<label>Nama Propinsi</label>
				    		<div class="form-group"><b>{!! $model['nama_propinsi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Kabupaten/Kota</label>
				    		<div class="form-group"><b>{!! $model['nama_kabupatenkota'] !!}</b></div>
				  		</div>
				  		
                            <div class="form-group">
                                <label>No Sk Tabg</label>
                                <div class="form-group"><b>{!! $model['no_sk_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Sk Tabg</label>
                                <div class="form-group"><b>{!! $model['tgl_sk_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Pejabat</label>
                                <div class="form-group"><b>{!! $model['nama_pejabat'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jabatan</label>
                                <div class="form-group"><b>{!! $model['jabatan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Nama Tabg</label>
                                <div class="form-group"><b>{!! $model['nama_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>No Ktp Tabg</label>
                                <div class="form-group"><b>{!! $model['no_ktp_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Alamat Tabg</label>
                                <div class="form-group"><b>{!! $model['alamat_tabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Pendidikan Terakhir Tabg</label>
                                <div class="form-group"><b>{!! $model['pendidikan_terakhir_tabg'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Jurusan Pendidikan Terakhir</label>
                                <div class="form-group"><b>{!! $model['jurusan_pendidikan_terakhir'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Asal Universitas</label>
                                <div class="form-group"><b>{!! $model['asal_universitas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Bidang Keahlian</label>
                                <div class="form-group"><b>{!! $model['bidang_keahlian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Jabatan Dalam Tim</label>
                                <div class="form-group"><b>{!! $model['jabatan_dalam_tim'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="form-group"><b>{!! $model['keterangan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>File Sk Tabg</label>
                                <div class="form-group">
                                    <a class="btn btn-primary" href="{!! $model['file_sk_tabg'] !!}">
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