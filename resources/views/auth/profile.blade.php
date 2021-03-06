@extends('layouts.app')
@section('title', 'Profil Anda')
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
						<div class="col-xs-4">
							<div class="form-group">
					    		<label>Name</label>
					    		<div class="form-group"><b>{!! $model['fullname'] !!}</b></div>
					  		</div>
					  		<div class="form-group">
					    		<label>Username</label>
					    		<div class="form-group"><b>{!! $model['username'] !!}</b></div>
					  		</div>
					  		<div class="form-group">
					    		<label>Email</label>
					    		<div class="form-group"><b>{!! $model['email'] !!}</b></div>
					  		</div>
					  	</div>
					  	<div class="col-xs-4">
					  		<div class="form-group">
					    		<label>Group</label>
					  			<div class="form-group"><b>{!! ($model['role_name']) ? $model['role_name'] : '-' !!}</b></div>
					  		</div>
					  		<div class="form-group">
					    		<label>Propinsi</label>
					  			<div class="form-group"><b>{!! ($model['province_name']) ? $model['province_name'] : '-' !!}</b></div>
					  		</div>
					  		<div class="form-group">
					    		<label>Kabupaten/Kota</label>
					  			<div class="form-group"><b>{!! ($model['city_name']) ? $model['city_name'] : '-' !!}</b></div>
					  		</div>
					  	</div>
					  	<div class="col-xs-4">
					  		<div class="form-group">
					    		<label>Sub Direktorat</label>
					  			<div class="form-group"><b>{!! ($model['subdit_name']) ? $model['subdit_name'] : '-' !!}</b></div>
					  		</div>
					  		<div class="form-group">
					    		<label>Status</label>
					    		<div class="form-group"><b>{!! ($model['status'] == '00') ? 'ACTIVE' : 'INACTIVE' !!}</b></div>
					  		</div>
					  	</div>
				  	</div>
				</div>
			</div>
      	</div>
   	</div>
</div>
@endsection