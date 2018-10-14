@extends('layouts.app')
@section('title', 'Regulasi Perda')

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
                            <label class="control-label col-lg-3">Perda Bg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_bg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File Perdabg*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_Perdabg',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_Perdabg']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_Perdabg']) ? $model['file_Perdabg'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rt Rw*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rt_rw',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File RTRW*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_RTRW',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_RTRW']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_RTRW']) ? $model['file_RTRW'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rd Tr*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rd_tr',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File RDTR*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_RDTR',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_RDTR']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_RDTR']) ? $model['file_RDTR'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Cagar Budaya*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_cagar_budaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerdaCagarBudaya*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerdaCagarBudaya',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerdaCagarBudaya']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerdaCagarBudaya']) ? $model['file_PerdaCagarBudaya'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perda Rth*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perda_rth',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerdaRTH*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerdaRTH',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerdaRTH']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerdaRTH']) ? $model['file_PerdaRTH'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Bgh*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_bgh',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupBGH*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupBGH',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupBGH']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupBGH']) ? $model['file_PerbupBGH'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Imb*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_imb',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupIMB*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupIMB',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupIMB']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupIMB']) ? $model['file_PerbupIMB'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Slf*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_slf',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                            </div>
                                <div class="col-lg-6">

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupSLF*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupSLF',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupSLF']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupSLF']) ? $model['file_PerbupSLF'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 1*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 1*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_1',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_1']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_1']) ? $model['file_PerbupRTBL_1'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 2*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 2*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_2',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_2']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_2']) ? $model['file_PerbupRTBL_2'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 3*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_3',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_3']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_3']) ? $model['file_PerbupRTBL_3'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 4*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 4*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_4',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_4']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_4']) ? $model['file_PerbupRTBL_4'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 5*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 5*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_5',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_5']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_5']) ? $model['file_PerbupRTBL_5'] : null !!}
                            </div>
                        </div>
                        @endif 

                        <div class="form-group">
                            <label class="control-label col-lg-3">Perwal Perbup Rtbl 6*</label>
                            <div class="col-lg-9"> 
                                {!! Form::text('perwal_perbup_rtbl_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-lg-3">File PerbupRTBL 6*</label>
                            <div class="col-lg-9"> 
                                {!! Form::file('file_PerbupRTBL_6',null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        @if (!empty($model['file_PerbupRTBL_6']))
                        <div class="form-group">
                            <label class="control-label col-lg-3">Attach File</label>
                            <div class="col-lg-9">
                                {!! ($model['file_PerbupRTBL_6']) ? $model['file_PerbupRTBL_6'] : null !!}
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