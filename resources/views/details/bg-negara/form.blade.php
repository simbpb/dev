@extends('layouts.app')
@section('title', 'Bg Negara')
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
                                        $user->provinceDetail->lokasi_propinsi.'-'.$user->provinceDetail->lokasi_nama, 
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

                            </div>
                                <div class="col-lg-6">

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