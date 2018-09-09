@extends('layouts.app')
@section('title', 'Tabg')

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
                            <label class="control-label col-lg-3">No Perbub Perwal*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_perbub_perwal',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tgl Penetapan Perbub Perwal*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tgl_penetapan_perbub_perwal',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Perbub Perwal*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_perbub_perwal',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_perbub_perwal']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_perbub_perwal']) ? $model['file_upload_perbub_perwal'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Lengkap*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_lengkap',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Keahlian*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('keahlian',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Sk Pengangkatan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('sk_pengangkatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Masa Tugas*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('masa_tugas',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Upload Sk Pengangkatan*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_upload_sk_pengangkatan',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_upload_sk_pengangkatan']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_upload_sk_pengangkatan']) ? $model['file_upload_sk_pengangkatan'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Fungsi Bg Terdata Dan Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('fungsi_bg_terdata_dan_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tipe Bg Terdata Dan Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tipe_bg_terdata_dan_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pemilik Bg Terdata Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pemilik_bg_terdata_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Lok Bg Terdata Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('lok_bg_terdata_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Fungsi Bg Terdata Dan Slf*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('fungsi_bg_terdata_dan_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Tipe Bg Terdata Dan Slf*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('tipe_bg_terdata_dan_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Nama Pemilik Bg Terdata Slf*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('nama_pemilik_bg_terdata_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Lok Bg Terdata Slf*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('lok_bg_terdata_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Imb Bg Didampingi Tabg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_imb_bg_didampingi_tabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">No Slf Bg Didampingi Tabg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('no_slf_bg_didampingi_tabg',null, ['class' => 'form-control']) !!}
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