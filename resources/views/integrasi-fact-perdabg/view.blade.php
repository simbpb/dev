@extends('layouts.app')
@section('title', 'Integrasi Fact Perdabg')

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
                                <label>Id Perda Bg</label>
                                <div class="form-group"><b>{!! $model['id_perda_bg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Id Info Wilayah</label>
                                <div class="form-group"><b>{!! $model['id_info_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kode</label>
                                <div class="form-group"><b>{!! $model['lokasi_kode'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Uraian</label>
                                <div class="form-group"><b>{!! $model['uraian'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Klasifikasi Berdasarkan Sasaran Utama</label>
                                <div class="form-group"><b>{!! $model['klasifikasi_berdasarkan_sasaran_utama'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Status Perdabg</label>
                                <div class="form-group"><b>{!! $model['status_perdabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <div class="form-group"><b>{!! $model['keterangan'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tgl Input Perdabg</label>
                                <div class="form-group"><b>{!! $model['tgl_input_perdabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Tahun Perdabg</label>
                                <div class="form-group"><b>{!! $model['tahun_perdabg'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>No Perdabg</label>
                                <div class="form-group"><b>{!! $model['no_perdabg'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Angka Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['angka_luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Satuan Luas Wilayah</label>
                                <div class="form-group"><b>{!! $model['satuan_luas_wilayah'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>IsActive</label>
                                <div class="form-group"><b>{!! $model['isActive'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Perdabg Sk</label>
                                <div class="form-group"><b>{!! $model['perdabg_sk'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Last Update</label>
                                <div class="form-group"><b>{!! $model['last_update'] !!}</b></div>
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