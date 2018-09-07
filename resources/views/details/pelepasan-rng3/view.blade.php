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
				    		<label>Nama Kecamatan</label>
				    		<div class="form-group"><b>{!! $model['nama_kecamatan'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>HD No. RN</label>
				    		<div class="form-group"><b>{!! $model['hdno_rn'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Penghuni</label>
				    		<div class="form-group"><b>{!! $model['nama_penghuni'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Kemen Lembaga</label>
				    		<div class="form-group"><b>{!! $model['kemen_lembaga'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Alamat RN</label>
				    		<div class="form-group"><b>{!! $model['alamat_rn'] !!}</b></div>
				  		</div>
				  	</div>
				  	<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Tahun Perjanjian Sewa Beli</label>
				    		<div class="form-group"><b>{!! $model['thn_perjanjian_sewabeli'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Status RN</label>
				    		<div class="form-group"><b>{!! $model['status_rn'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Thn Pelepasan RNG3</label>
				    		<div class="form-group"><b>{!! $model['thn_pelepasan_rng3'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>SK Hak Milik</label>
				    		<div class="form-group"><b>{!! $model['sk_hak_milik'] !!}</b></div>
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
				    		<label>File SK Gol 3</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload_sip_gol3'] !!}" >
				    			<i class="icon-file-download2"></i>
				    			Download File</a>
				    		</div>
				  		</div>
				  		<div class="form-group">
				    		<label>No. SK Menteri PUPR</label>
				    		<div class="form-group"><b>{!! $model['no_sk_menteri_pupr'] !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>File SK Gol 3</label>
				    		<div class="form-group">
				    			<a class="btn btn-primary" href="{!! $model['file_upload_sk_menteri_pupr'] !!}" >
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