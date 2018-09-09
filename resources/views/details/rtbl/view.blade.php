@extends('layouts.app')
@section('title', 'Pelepasan RNG3')

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
				    		<label>No. Perbub Perwal</label>
				    		<div class="form-group"><b>{!! $model['no_perbub_perwal'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tgl Penetapan Perbub Perwal</label>
				    		<div class="form-group"><b>{!! $model['tgl_penetapan_perbub_perwal'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tahun RTBL</label>
				    		<div class="form-group"><b>{!! $model['tahun_rtbl'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Usulan Kawasan RTBL</label>
				    		<div class="form-group"><b>{!! $model['usulan_kws_rtbl'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Luas Kawasan</label>
				    		<div class="form-group"><b>{!! $model['luas_kws'] !!}</b></div>
				  		</div>
				  	</div>
				  	<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Satuan Luas Kawasan</label>
				    		<div class="form-group"><b>{!! $model['satuan_luas_kws'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Cakupan Wilayah</label>
				    		<div class="form-group"><b>{!! $model['cakupan_wilayah'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Uraian Karakter Lokasi</label>
				    		<div class="form-group"><b>{!! $model['uraian_karakter_lokasi'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Uraian Usulan Kawasan</label>
				    		<div class="form-group"><b>{!! $model['uraian_usulan_kws'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>No. SK Gol 3</label>
				    		<div class="form-group"><b>{!! $model['no_sk_gol3'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>File SK Gol 3</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload_sk_gol3'] !!}" >
				    			<i class="icon-file-download2"></i>
				    			Download File</a>
				    		</div>
				  		</div>
				  		<div class="form-group">
				    		<label>No. SIP Gol 3</label>
				    		<div class="form-group"><b>{!! $model['no_sip_gol3'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>File Upload RTBL</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload_rtbl'] !!}" >
				    			<i class="icon-file-download2"></i>
				    			Download File</a>
				    		</div>
				  		</div>
				  		<div class="form-group">
				    		<label>File Upload Perbub Perwal</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload_perbub_perwal'] !!}" >
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