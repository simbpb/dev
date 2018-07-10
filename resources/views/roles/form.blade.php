@extends('layouts.app')
@section('title', 'Group')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-users2 position-left"></i> 
               		<a href="{{ Navigation::adminUrl('/roles') }}">@yield('title')</a> 
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
				    {{ Form::model($model, ['id' => 'model-form','class'=>'form-horizontal']) }}
				@else
				    {{ Form::open(['id' => 'model-form','class'=>'form-horizontal']) }}
				@endif
				<div class="row"> 
					<div class="col-lg-8">
						<div class="form-group">
				    		<label class="control-label col-lg-2">Nama*</label>
				    		<div class="col-lg-5"> 
					    		{!! Form::text('name',null, ['class' => 'form-control']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Kategori*</label>
				    		<div class="col-lg-5">
					    		{!! Form::select('category', $categories, null, ['placeholder' => 'Pilih Kategori','class' => 'form-control']) !!}
					    	</div>
				  		</div>
			  		</div>
		  		</div>
		  		<fieldset class="content-group">
		  			<legend class="text-bold"><i class="icon-key position-left"></i> Pengaturan Akses</legend>
		  			<table class="table table-bordered table-striped">
			  			<tr>
			  				<th width="25%">Menu</th>
			  				<th width="75%">Permission</th>
			  			</tr>
			  			@foreach($menus as $menu)
			  				<tr>
			  					<td>{{ $menu['label'] }}</td>
			  					<td>
			  						@foreach($menu['permissions'] as $permission)
			  							<div class="row col-lg-3">
				  							<label class="checkbox-inline">
				  								@if(isset($model))
					  								@php
					  									$checked = Navigation::checkPermission($permission['id'], $model->id);
					  								@endphp
					  								<input type="checkbox" {{ ($checked) ? 'checked' : '' }} name="permissions[]" value="{{ $permission['id'] }}">
					  							@else
					  								<input type="checkbox" name="permissions[]" value="{{ $permission['id'] }}">
					  							@endif
				  								{{ $permission['alias'] }}
				  							</label>
				  						</div>
			  						@endforeach
			  					</td>
			  				</tr>
			  			@endforeach
			  		</table>
		  		</fieldset>
		  		@include('widgets.submit_button')
				{!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>
{!! $validator->selector('#model-form') !!}
@endsection