@extends('layouts.app')
@section('title', 'Menu')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-users2 position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/menus') }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> Rincian  
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
				    		<label class="control-label col-lg-2">Nama</label>
				    		<div class="col-lg-5"> 
					    		{!! Form::text('name',null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
					    	</div>
				  		</div>
				  		<div class="form-group">
				    		<label class="control-label col-lg-2">Deskripsi</label>
				    		<div class="col-lg-10"> 
					    		{!! Form::text('description',null, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
					    	</div>
				  		</div>
			  		</div>
		  		</div>
		  		<div class="text-right">
					<button class="btn btn-warning" type="button" onclick="history.back();"><i class="icon-undo2"></i> Kembali</button>
				</div>
				{!! Form::close() !!}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection