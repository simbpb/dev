@extends('layouts.app')
@section('title', 'Pelepasan Rng 3')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               	<h5 class="panel-title">
               		<i class="icon-user position-left"></i>
               		<a href="{{ Navigation::adminUrl('/details/'.$path) }}">@yield('title')</a> 
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
					  			{!! Form::select('propinsi_id', $provinces, null, ['id' => 'provinces', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-3">Kabupaten/Kota*</label>
				    		<div class="col-lg-9"> 
					  			{!! Form::select('kota_id', ['' => 'Pilih Kabupaten/Kota'], null, ['id' => 'cities', 'class' => 'form-control']) !!}
					  		</div>
				  		</div>
						
                        <div class="form-group">
                            <label class="control-label col-lg-3">Hdno Rn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('hdno_rn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Kecamatan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_kecamatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Kemen Lembaga*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('kemen_lembaga',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Penghuni*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_penghuni',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Alamat Rn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('alamat_rn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Sk Gol3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_sk_gol3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Sk Gol3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_sk_gol3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_sk_gol3']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_sk_gol3']) ? $model['file_upload_sk_gol3'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Sip Gol3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_sip_gol3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Sip Gol3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_sip_gol3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_sip_gol3']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_sip_gol3']) ? $model['file_upload_sip_gol3'] : null !!}
                            </div>
                        </div>
                        @endif 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Sk Menteri Pupr*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_sk_menteri_pupr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Sk Menteri Pupr*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_sk_menteri_pupr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_sk_menteri_pupr']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_sk_menteri_pupr']) ? $model['file_upload_sk_menteri_pupr'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Thn Perjanjian Sewabeli*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('thn_perjanjian_sewabeli',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Status Rn*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('status_rn',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Thn Pelepasan Rng3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('thn_pelepasan_rng3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Sk Hak Milik*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('sk_hak_milik',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Sk Hak Milik*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_sk_hak_milik',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_sk_hak_milik']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_sk_hak_milik']) ? $model['file_upload_sk_hak_milik'] : null !!}
                            </div>
                        </div>
                        @endif 

						<div class="form-group">
				    		<label class="control-label col-lg-3">Status</label>
				    		<div class="col-lg-9">
				    			@if(!empty($model) && $model['is_actived'] == 'ACTIVE')
					    			{!! Form::checkbox('status', 'ACTIVE', $model['is_actived']) !!}
					    		@else
								    {!! Form::checkbox('status', 'ACTIVE') !!}
								@endif
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
	@if(isset($model))
		var currentProvinceId = $('#provinces').val();
		getCities(currentProvinceId, function(){
			$('#cities').val('<?=$model['kota_id']?>');
		});
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