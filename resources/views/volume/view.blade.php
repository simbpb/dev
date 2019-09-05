@extends('layouts.app')
@section('title', 'Volume')

@section('content')
<div class="page-container">
   <div class="page-content">
      <div class="content-wrapper">
         <div class="panel panel-flat">
            <div class="panel-heading">
               <h5 class="panel-title">
               		<i class="icon-grid3 position-left"></i> 
	               	<a href="{{ Navigation::adminUrl('/suboutput') }}">@yield('title')</a>
	               	<i class="icon-forward3"></i> Rincian  
	           </h5>
               <div class="heading-elements">
                  <ul class="icons-list">
                     <li><a data-action="collapse"></a></li>
                  </ul>
               </div>
            </div>
            <div class="panel-body">
            	<div class="row">
					<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Master</label>
				    		<div class="form-group"><b>{!! $model->master !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Master ID</label>
				    		<div class="form-group"><b>{!! $model->master_id !!}</b></div>
				  		</div>
						<div class="form-group">
				    		<label>Jenis Volume</label>
				    		<div class="form-group"><b>{!! $model->jenis_volume !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Output</label>
				    		<div class="form-group"><b>{!! $model->output->nama_output !!}</b></div>
				  		</div>
				  	</div>
			  	</div>
			  	<div class="text-right">
					<button class="btn btn-warning" type="button" onclick="history.back();"><i class="icon-undo2"></i> Kembali</button>
				</div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection