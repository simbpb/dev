@extends('layouts.app')
@section('title', 'Faq Rth Rencana Tigapuluhpersen')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/faqs/'.$path) }}">@yield('title')</a> 
               		<i class="icon-forward3"></i> {!! (isset($model)) ? 'Ubah' : 'Tambah' !!}
               	</h5>
               	<div class="heading-elements">
                  	<ul class="icons-list">
                     	<li><a data-action="collapse"></a></li>
                  	</ul>
               	</div>
            </div>
            <div class="panel-body">
            	@include('widgets.error')
            	@if(isset($model))
				    {{ Form::model($model, ['id' => 'model-form','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) }}
				@else
				    {{ Form::open(['id' => 'model-form','class'=>'form-horizontal', 'enctype' => 'multipart/form-data']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-6">
						
                        <div class="form-group">
                            <label class="control-label col-lg-3">Rth Rencana Tigapuluhpersen Id</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rth_rencana_tigapuluhpersen_id',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Info Wilayah Id</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('info_wilayah_id',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Detail Kdprog Id</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('detail_kdprog_id',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Thn Periode Keg</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('thn_periode_keg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Lokasi Kode</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('lokasi_kode',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Propinsi</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_propinsi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Kabupatenkota</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_kabupatenkota',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kd Struktur</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kd_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Dok Rencana Kota Hijau Rakh</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('dok_rencana_kota_hijau_rakh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Dok Rencana Kota Hijau Rakh</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_dok_rencana_kota_hijau_rakh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_dok_rencana_kota_hijau_rakh']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_dok_rencana_kota_hijau_rakh']) ? $model['file_dok_rencana_kota_hijau_rakh'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Dokumen Perencanaan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_dokumen_perencanaan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Dok Disusun Tahun</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('dok_disusun_tahun',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Dok Disahkan Oleh</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('dok_disahkan_oleh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Input Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_input_wilayah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Info Wilayah Sk</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('info_wilayah_sk',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Last Update</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('last_update',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

			  		</div>
		  		</div>
		  		@include('widgets.submit_button')
				{!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection