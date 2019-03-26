@extends('layouts.app')
@section('title', 'Faq Regulasi Perda')
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
                            <label class="control-label col-lg-3">Regulasi Perda Id</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('regulasi_perda_id',null, ['class' => 'form-control']) !!}
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
                            <label class="control-label col-lg-3">Perda Bg</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perda Bg</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_bg']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_bg']) ? $model['file_perda_bg'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rt Rw</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rt_rw',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Rt Rw</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_rt_rw',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_rt_rw']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_rt_rw']) ? $model['file_rt_rw'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rd Tr</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rd_tr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Rd Tr</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_rd_tr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_rd_tr']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_rd_tr']) ? $model['file_rd_tr'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Cagar Budaya</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_cagar_budaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perda Cagar Budaya</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_cagar_budaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_cagar_budaya']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_cagar_budaya']) ? $model['file_perda_cagar_budaya'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rth</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rth',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perda Rth</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perda_rth',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perda_rth']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perda_rth']) ? $model['file_perda_rth'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Bgh</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_bgh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Bgh</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_bgh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_bgh']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_bgh']) ? $model['file_perbup_bgh'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Imb</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Imb</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_imb']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_imb']) ? $model['file_perbup_imb'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Slf</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Slf</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_slf']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_slf']) ? $model['file_perbup_slf'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 1</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 1</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_1']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_1']) ? $model['file_perbup_rtbl_1'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 2</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 2</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_2']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_2']) ? $model['file_perbup_rtbl_2'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 3</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 3</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_3']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_3']) ? $model['file_perbup_rtbl_3'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 4</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 4</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_4']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_4']) ? $model['file_perbup_rtbl_4'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 5</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 5</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_5']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_5']) ? $model['file_perbup_rtbl_5'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 6</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perbup Rtbl 6</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_perbup_rtbl_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_perbup_rtbl_6']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_perbup_rtbl_6']) ? $model['file_perbup_rtbl_6'] : null !!}
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