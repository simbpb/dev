@extends('layouts.app')
@section('title', 'Faq Bg Negara')
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
                            <label class="control-label col-lg-3">Bg Negara Id</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('bg_negara_id',null, ['class' => 'form-control']) !!}
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
                            <label class="control-label col-lg-3">Nama Bg Negara</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_bg_negara',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Instansi Pemilik Bg Negara</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('instansi_pemilik_bg_negara',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat Bg Negara</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('alamat_bg_negara',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Bg Negara M2</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_bg_negara_m2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Titik Koordinat Lat</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('titik_koordinat_lat',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Titik Koordinat Long</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('titik_koordinat_long',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Dokumentasi</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('dokumentasi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['dokumentasi']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['dokumentasi']) ? $model['dokumentasi'] : null !!}
                            </div>
                        </div>
                        @endif 

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