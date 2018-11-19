@extends('layouts.app')
@section('title', 'Integrasi Fact Hsbgn')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/'.$path) }}">@yield('title')</a> 
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
                            <label class="control-label col-lg-3">Id Tbl Hsbgn</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('id_tbl_hsbgn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Id Info Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('id_info_wilayah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Lokasi Kode</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('lokasi_kode',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kode Struktur</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kd_struktur',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Uraian</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('uraian',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tahun Penetapan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tahun_penetapan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Kecamatan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_kecamatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Klasifikasi Berdasarkan Sasaran Utama</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('klasifikasi_berdasarkan_sasaran_utama',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Luas Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('luas_wilayah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Angka Luas Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('angka_luas_wilayah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Satuan Luas Wilayah</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('satuan_luas_wilayah',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Zona</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('zona',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bg Tidak Sederhana</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('bg_tidak_sederhana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bg Sederhana</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('bg_sederhana',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumahnegara Tipe A</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_a',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumahnegara Tipe B</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_b',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Rumahnegara Tipe C D E</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('rumahnegara_tipe_c_d_e',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedungnegara Depan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_depan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedungnegara Samping</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_samping',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Gedungnegara Belakang</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_gedungnegara_belakang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumahnegara Depan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_depan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumahnegara Samping</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_samping',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pagar Rumahnegara Belakang</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('pagar_rumahnegara_belakang',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Sk Penetapan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('sk_penetapan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Indeks Kemahalan Konstruksi</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('indeks_kemahalan_konstruksi',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Input Hsbgn</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_input_hsbgn',null, ['class' => 'form-control']) !!}
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