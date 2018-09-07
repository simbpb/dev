@extends('layouts.app')
@section('title', 'Kebun Raya')

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
				    		<label>Tgl Input Perdabg</label>
				    		<div class="form-group"><b>{!! $model['tgl_input_perdabg'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Pejabat yg Menetapkan</label>
				    		<div class="form-group"><b>{!! $model['nama_pejabat_yg_menetapkan'] !!}</b></div>
				  		</div>
				  	</div>
				  	<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Status Perdabg</label>
				    		<div class="form-group"><b>{!! $model['status_perdabg'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tempat Penetapan</label>
				    		<div class="form-group"><b>{!! $model['tempat_penetapan'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>No Perdabg</label>
				    		<div class="form-group"><b>{!! $model['no_perdabg'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Keterangan</label>
				    		<div class="form-group"><b>{!! $model['keterangan'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>File</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload'] !!}" >
				    			<i class="icon-file-download2"></i>
				    			Download File</a>
				    		</div>
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