@extends('layouts.app')
@section('title', 'Program/Kegiatan')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-grid3 position-left"></i> 
               		<a href="{{ Navigation::adminUrl('/program') }}">@yield('title')</a> 
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
				    {{ Form::model($model, ['id' => 'model-form']) }}
				@else
				    {{ Form::open(['id' => 'model-form']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-6">
                  <div class="form-group">
                     <label>Renstra</label>
                     {!! Form::select('renstra_id', ['' => 'Pilih Renstra'] + $renstra, null, ['id' => 'renstra', 'class' => 'form-control program']) !!}
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-9">
                        <div class="form-group">
                           <label>Output</label>
                           {!! Form::select('output_id', ['' => 'Pilih Output'] + $output, null, ['id' => 'output', 'class' => 'form-control program']) !!}
                        </div>
                     </div>
                     <div class="col-lg-3">
                        <div class="form-group">
                           <label>Volume</label>
                           {!! Form::select('volume_id', ['' => 'Pilih Volume'], null, ['id' => 'volume', 'class' => 'form-control']) !!}
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Suboutput</label>
                     {!! Form::select('suboutput_id', ['' => 'Pilih Suboutput'], null, ['id' => 'suboutput', 'class' => 'form-control']) !!}
                  </div>
                  <div class="form-group">
                     <label>Sasaran</label>
                     {!! Form::select('sasaran_id', ['' => 'Pilih Sasaran'], null, ['id' => 'sasaran', 'class' => 'form-control']) !!}
                  </div>
			  		</div>
               <div class="col-lg-6">
                  <div class="form-group">
                     <label>Summary Program*</label> 
                     {!! Form::textarea('exe_summary_prog',null, ['id' => 'exe_summary_prog', 'class' => 'form-control', 'rows' => '5']) !!}
                     {!! Form::hidden('uraian_id',null, ['id' => 'uraian', 'class' => 'form-control']) !!}
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Tahun Program*</label> 
                           {!! Form::text('thn_prog',null, ['class' => 'form-control']) !!}
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div class="form-group">
                           <label>Subdit*</label>
                           {!! Form::select('subdit_id', $subdit, null, ['placeholder' => 'Pilih Subdit','class' => 'form-control']) !!}
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Status</label>
                     <div class="col-lg-12 row">
                        @if(isset($model))
                           {!! Form::checkbox('status', '00', ($model->status == '00') ? true : false) !!}
                        @else
                           {!! Form::checkbox('status', '00') !!}
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
@endsection
@section('js')
<script>
$(function() {
   $('.program').select2();
   @if(isset($model))
      getAjaxSource(<?=$model['output_id']?>, '#suboutput','ajax/suboutput', function(){
         $('#suboutput').val(<?=$model['suboutput_id']?>);
      });
      getAjaxSource(<?=$model['output_id']?>, '#volume','ajax/volume', function(){
         $('#volume').val(<?=$model['volume_id']?>);
      });
      getAjaxSource(<?=$model['suboutput_id']?>, '#sasaran','ajax/sasaran', function(){
         $('#sasaran').val(<?=$model['sasaran_id']?>);
      });
   @endif
   getCascade('#output','#suboutput','ajax/suboutput');
   getCascade('#output','#volume','ajax/volume');
   getCascade('#suboutput','#sasaran','ajax/sasaran');

   $('#sasaran').change(function() {
      getAjaxUraian();
   });
});

function getCascade(element, elementTarget, path, callback) {
   $(element).change(function() {
      var id = this.value;
      getAjaxSource(id, elementTarget, path);
      $('#uraian').val('');
      $('#exe_summary_prog').val('');
   });
}

function getAjaxSource(id, elementTarget, path, callback) {
   $(elementTarget).find('option').not(':first').remove();
   $.ajax({
         url: base_url + '/' + path + '/' + id,
         type: 'GET',
         datatype: 'JSON',
         success: function (result) {
            $.each(result, function (i, item) {
                $(elementTarget).append($('<option></option>').val(item.id).html(item.text));
            });
            if (callback != undefined) {
               callback()
            }
         }
   });
}

function getAjaxUraian() {
   var params = {
      output_id: $('#output').val(),
      suboutput_id: $('#suboutput').val(),
      sasaran_id: $('#sasaran').val(),
      volume_id: $('#volume').val()
   };
   $.ajax({
         url: base_url + '/ajax/uraian',
         type: 'GET',
         datatype: 'JSON',
         data: params,
         success: function (result) {
            $('#uraian').val(result.id);
            $('#exe_summary_prog').val(result.content);
         }
   });
}
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection