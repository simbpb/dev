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
	               	<a href="{{ Navigation::adminUrl('/roles') }}">@yield('title')</a>
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
				    		<label>Uraian Renstra</label>
				    		<div class="form-group"><b>{!! $model->renstra->uraian_renstra !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Nama Pointer Renstra</label>
				    		<div class="form-group"><b>{!! $model->renstra->nama_pointers !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Output</label>
				    		<div class="form-group"><b>{!! $model->output->nama_output !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>SubOutput</label>
				    		<div class="form-group"><b>{!! $model->suboutput->nama_suboutput !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Sasaran</label>
				    		<div class="form-group"><b>{!! $model->sasaran->nama_sasaran !!}</b></div>
				  		</div>
				  	</div>
				  	<div class="col-xs-6">
				  		<div class="form-group">
				    		<label>Jenis Volume</label>
				    		<div class="form-group"><b>{!! $model->volume->jenis_volume !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Summary Program</label>
				    		<div class="form-group"><b>{!! $model->exe_summary_prog !!}</b></div>
				  		</div>
				  		<div class="form-group">
				    		<label>Tahun Program</label>
				    		<div class="form-group"><b>{!! $model->thn_prog !!}</b></div>
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