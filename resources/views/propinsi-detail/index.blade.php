@extends('layouts.app')
@section('title', 'Pengaturan Propinsi dan Program Kerja')
@section('content')
<div class="page-container">
   	<div class="page-content">
      	<div class="content-wrapper">
         	<div class="panel panel-flat">
	            <div class="panel-heading">
	               <h5 class="panel-title"><i class="icon-user-tie position-left"></i> @yield('title')</h5>
	               <div class="heading-elements">
	                  <ul class="icons-list">
	                     <li><a data-action="collapse"></a></li>
	                  </ul>
	               </div>
	            </div>
	            <div class="panel-body">
	            	<div class="row">
	            		@include('widgets.message')
						{{ Form::open(['id' => 'model-form', 'url' => config('app.auth_page').'/propinsi-detail/insert']) }}
		            	<div class="form-group">
		            		<div class="col-lg-12">
								<div class="row">
									<div class="col-xs-3">
										{!! Form::select('propinsi_id', 
											$provinces, 
											null, 
											['id' => 'provinces',
											'class' => 'form-control']) !!}
									</div>
								</div>
							</div>
							<div class="col-lg-12">&nbsp;</div>
						</div>
						<div id="result"></div>
					</div>
					<div class="row" style="margin-top: 10px;" id="buttonsubmit">
						<div class="col-md-12">
							@include('widgets.submit_button')
							{!! Form::close() !!}
						</div>
					</div>
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
	$('#buttonsubmit').hide();
    $('#provinces').change(function() {
    	if (this.value) {
	    	$.ajax({
		        url: base_url + '/propinsi-detail?provinceId=' + this.value,
		        type: 'GET',
		        datatype: 'JSON',
		        success: function (result) {
		        	$('#buttonsubmit').show();
		            $('#result').html(result);
		        }
		    });
	    } else {
	    	$('#buttonsubmit').hide();
	    	$('#result').html('');
	    }
    });

});
</script>
@endsection