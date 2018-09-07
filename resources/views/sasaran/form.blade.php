@extends('layouts.app')
@section('title', 'Sasaran')
@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-key position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/permissions') }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> {!! (isset($model)) ? 'Ubah' : 'Tambah' !!} @yield('title')
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
				    {{ Form::model($model, ['id' => 'model-form','class'=>'form-horizontal']) }}
				@else
				    {{ Form::open(['id' => 'model-form','class'=>'form-horizontal']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-10">
						<div class="form-group">
				    		<label class="control-label col-lg-2">Master*</label>
				    		<div class="col-lg-5"> 
					    		{!! Form::text('master',isset($model) ? null : 'SSR', ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-2">Output*</label>
				    		<div class="col-lg-8"> 
					    		{!! Form::select('output_id',['' => 'Pilih Output'] + $output, null, ['id'=> 'output','class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Suboutput*</label>
				    		<div class="col-lg-8"> 
					    		{!! Form::select('suboutput_id',['' => 'Pilih Suboutput'], null, ['id'=> 'suboutput','class' => 'form-control']) !!}
					    	</div>
				  		</div>
						<div class="form-group">
				    		<label class="control-label col-lg-2">Nama Sasaran*</label>
				    		<div class="col-lg-8"> 
					    		{!! Form::text('nama_sasaran',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
                  <div class="form-group">
                     <label class="control-label col-lg-2">Detail Program*</label>
                     <div class="col-lg-8"> 
                        {!! Form::select('detail_ids[]', $detail, !empty($model)?$model->details:null, ['id'=> 'detail', 'class' => 'form-control', 'multiple' => 'multiple']) !!}
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
<script>
$(function() {
	@if(isset($model))
      getAjaxSource(<?=$model['output_id']?>, '#suboutput','ajax/suboutput', function(){
         $('#suboutput').val(<?=$model['suboutput_id']?>);
      });
   @endif
	getCascade('#output','#suboutput','ajax/suboutput');
});
function getCascade(element, elementTarget, path, callback) {
   $(element).change(function() {
      var id = this.value;
      getAjaxSource(id, elementTarget, path);
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
</script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection