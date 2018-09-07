@extends('layouts.app')
@section('title', 'P2KH')

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
				    		<label>Uraian Karakter Lokasi</label>
				    		<div class="form-group"><b>{!! $model['uraian_karakter_lokasi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tipe Dokumen</label>
				    		<div class="form-group"><b>{!! $model['tipe_dok_p2kh'] !!}</b></div>
				  		</div>
				  	</div>
				  	<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Nama Lokasi</label>
				    		<div class="form-group"><b>{!! $model['nama_lokasi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Luas Kawasan</label>
				    		<div class="form-group"><b>{!! $model['luas_kws'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Satuan Luas Kawasan</label>
				    		<div class="form-group"><b>{!! $model['satuan_luas_kws'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Cakupan Wilayah</label>
				    		<div class="form-group"><b>{!! $model['cakupan_wilayah'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tahun Penetapan</label>
				    		<div class="form-group"><b>{!! $model['thn_penetapan'] !!}</b></div>
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