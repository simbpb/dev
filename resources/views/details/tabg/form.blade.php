@extends('layouts.app')
@section('title', 'DATA TIM AHLI BANGUNAN GEDUNG (TABG)')
@php
$user = Auth::user();
@endphp
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/details/'.$path.'/'.$programId) }}">@yield('title')</a> 
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
				    		<label class="control-label col-lg-3">Thn Periode Kegiatan*</label>
				    		<div class="col-lg-9"> 
					    		{!! Form::text('thn_periode_keg',null, ['class' => 'form-control']) !!}
					    		{!! Form::hidden('program_id',$programId) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Propinsi*</label>
				    		<div class="col-lg-9"> 
					  			@if (empty($user->provinceDetail->lokasi_propinsi))

                                    {!! Form::select('propinsi_id', 
                                        $provinces, 
                                        null, 
                                        ['id' => 'provinces',
                                         'class' => 'form-control']) !!}

                                @elseif (!empty($user->provinceDetail->lokasi_propinsi))

                                    {!! Form::select('propinsi_id', 
                                        $provinces, 
                                        isset($model) ? null : $user->provinceDetail->lokasi_propinsi.'-'.$user->provinceDetail->lokasi_nama, 
                                        ['id' => 'provinces',
                                         'class' => 'form-control',
                                         'disabled' => 'disabled']) !!}
                                    {!! Form::hidden('propinsi_id',
                                        $user->provinceDetail->lokasi_propinsi) !!}
                                @endif
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kabupaten/Kota*</label>
				    		<div class="col-lg-9"> 
					  		 @if (empty($user->cityDetail->lokasi_kabupatenkota))

                      {!! Form::select('kota_id', 
                          ['00' => 'Pilih Kabupaten/Kota'], 
                          null, 
                          ['id' => 'cities', 
                          'class' => 'form-control']) !!}

                  @elseif (!empty($user->cityDetail->lokasi_kabupatenkota))

                      {!! Form::select('kota_id', 
                          ['00' => 'Pilih Kabupaten/Kota'], 
                          null, 
                          ['id' => 'cities', 
                           'class' => 'form-control',
                           'disabled' => 'disabled']) !!}

                      {!! Form::hidden('kota_id',
                      $user->cityDetail->lokasi_kabupatenkota) !!}
                  @endif
                </div>
				  		</div>
						
                        <div class="form-group">
                            <label class="control-label col-lg-3">No SK TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_sk_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl SK TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_sk_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pejabat</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pejabat',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jabatan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jabatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No KTP TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_ktp_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('alamat_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Pendidikan Terakhir TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::select('pendidikan_terakhir_tabg',
				[
				'Diploma'=>'Diploma',
                                'Sarjana Strata 1 (S1)'=>'Sarjana Strata 1 (S1)',
                                'Sarjana Strata 2 (S2)'=>'Sarjana Strata 2 (S2)',
                                'Sarjana Strata 3 (S3)'=>'Sarjana Strata 3 (S3)'
				],
				null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Jurusan Pendidikan Terakhir</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('jurusan_pendidikan_terakhir',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Asal Universitas</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('asal_universitas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Bidang Keahlian</label>
                            <div class="col-lg-9"> 
                                {!! Form::select('bidang_keahlian',
				[
				'Arsitektur Bangunan Gedung dan Perkotaan'=>'Arsitektur Bangunan Gedung dan Perkotaan',
                                'Struktur dan Konstruksi Bangunan Gedung'=>'Struktur dan Konstruksi Bangunan Gedung',
                                'Mekanikal dan Elektrikal Bangunan Gedung'=>'Mekanikal dan Elektrikal Bangunan Gedung',
                                'Bangunan Gedung Adat'=>'Bangunan Gedung Adat', 
                                'Bidang Utilitas Jaringan Air Bersih dan Air Kotor Bangunan Gedung'=>'Bidang Utilitas Jaringan Air Bersih dan Air Kotor Bangunan Gedung',
                                'Bidang Keamanan terhadap Bahaya Kebakaran Bangunan Gedung'=>'Bidang Keamanan terhadap Bahaya Kebakaran Bangunan Gedung',
                                'Bidang Seni dan Budaya Bangunan Gedung'=>'Bidang Seni dan Budaya Bangunan Gedung'
				],
				null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwakilan/ Unsur</label>
                            <div class="col-lg-9"> 
                                {!! Form::select('jabatan_dalam_tim',
				[
				'Perguruan Tinggi'=>'Perguruan Tinggi',
				'Asosiasi Profesi'=>'Asosiasi Profes',
				'Masyarakat Ahli'=>'Masyarakat Ahli',
				'Masyarakat Adat'=>'Masyarakat Adat',
				'Pejabat Pemerintah'=>'Pejabat Pemerintah'	
				],
				null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Keterangan Tambahan</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('keterangan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Sk TABG</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_sk_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_sk_tabg']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_sk_tabg']) ? $model['file_sk_tabg'] : null !!}
                            </div>
                        </div>
                        @endif 

						<div class="form-group">
				    		<label class="control-label col-lg-3">Status</label>
				    		<div class="col-lg-9">
								{!! Form::checkbox('status', null, isset($model) ? $model['is_actived'] : 0) !!}
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
<script type="text/javascript">
$(function() {
	var currentProvinceId = $('#provinces').val();
    @if(isset($user->cityDetail))
        getCities(currentProvinceId, function(){
            $('#cities').val('<?=$user->cityDetail->lokasi_kabupatenkota?>');
        });
    @endif
  @if(isset($model))
    getCities(currentProvinceId, function(){
      $('#cities').val('<?=$model['kota_id']?>');
    });
    @else
        getCities(currentProvinceId);
  @endif
    $('#provinces').change(function() {
        var provinceId = this.value;
        getCities(provinceId);
    });
});

function getCities(provinceId, callback) {
	$('#cities').find('option').not(':first').remove();
	$.ajax({
        url: base_url + '/ajax/cities/' + provinceId,
        type: 'GET',
        datatype: 'JSON',
        success: function (result) {
            $.each(result, function (i, item) {
                $('#cities').append($('<option></option>').val(i).html(item));
            });
            callback()
        }
    });
}
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection
