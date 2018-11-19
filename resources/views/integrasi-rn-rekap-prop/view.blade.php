@extends('layouts.app')
@section('title', 'Integrasi Rn Rekap Prop')

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
                                <label>Id Rekap Prop</label>
                                <div class="form-group"><b>{!! $model['id_rekap_prop'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Lokasi Kode</label>
                                <div class="form-group"><b>{!! $model['lokasi_kode'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Prop Sewa</label>
                                <div class="form-group"><b>{!! $model['prop_sewa'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Prop Sewa Beli</label>
                                <div class="form-group"><b>{!! $model['prop_sewa_beli'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Prop Lunas</label>
                                <div class="form-group"><b>{!! $model['prop_lunas'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Prop Hak Milik</label>
                                <div class="form-group"><b>{!! $model['prop_hak_milik'] !!}</b></div>
                            </div>

                            </div>
                                <div class="col-lg-6">

                            <div class="form-group">
                                <label>Total</label>
                                <div class="form-group"><b>{!! $model['total'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Created Date</label>
                                <div class="form-group"><b>{!! $model['created_date'] !!}</b></div>
                            </div>

                            <div class="form-group">
                                <label>Updated Date</label>
                                <div class="form-group"><b>{!! $model['updated_date'] !!}</b></div>
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