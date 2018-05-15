@extends('layouts.login')
@section('content')
<div class="login-container">
		<div class="center">
			<h4>
				<img src="{{ asset('assets/img/pu-logo.png') }}">
				<b> 
					<div class="light-login" id="id-text2">
					  Sistem Informasi 
					</div>
					<div class="light-login" id="id-text2">
					  Bina Penataan Bangunan (SI-BPB)
					</div>
				</b>
			</h4>
			
		</div>
		<div class="space-6"></div>
		<div class="position-relative">
			<div id="login-box" class="login-box visible widget-box no-border">
				<div class="widget-body">
					<div class="widget-main">
						<h4 class="header new_green lighter bigger">
							Form Login
						</h4>
						<div class="space-6"></div>
						{{ Form::open(['role' => 'form']) }}
							<fieldset>
								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										{!! Form::text('username',null, ['class' => 'form-control', 'placeholder' => 'Type Username']) !!}
										<i class="ace-icon fa fa-user"></i>
									</span>
								</label>

								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										{!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Type Password']) !!}
										<i class="ace-icon fa fa-lock"></i>
									</span>
								</label>

								<div class="space"></div>

								<div class="clearfix">
									<a href="{{ url('') }}" class="width-35 pull-left btn btn-sm"> 
										<i class="ace-icon fa fa-undo "></i> Kembali 
									</a>
									<button type="submit" name="user_login" class="width-35 pull-right btn btn-sm btn-primary">
										<i class="ace-icon fa fa-key"></i>
										<span class="bigger-110">Login</span>
									</button>
								</div>

								<div class="space-4"></div>
							</fieldset>
						{{ Form::close() }}
						@include('widgets.errors')
					<div class="toolbar clearfix">
					</div>
				</div><!-- /.widget-body -->
			</div><!-- /.login-box -->
				<h6 class="white" id="id-company-text">
					<center>&copy 2018 <br>
						Kementerian Pekerjaan Umum dan Perumahan Rakyat<br>
						Direktorat Jenderal Cipta Karya<br>
						Direktorat Bina Penataan Bangunan<br>
						Subdirektorat Perencanaan Teknis<br>
						Jl. Pattimura No. 20, Kebayoran Baru <br>
						Jakarta Selatan, 12110<br>
					</center>
				</h6>
		</div><!-- /.position-relative -->
	</div>
</div><!-- /.col -->
@endsection