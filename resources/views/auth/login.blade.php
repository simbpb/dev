@extends('layouts.master')
@section('content')
{{ Form::open(['role' => 'form']) }}
    <div class="panel panel-body login-form">
        <div class="text-center">
          <h5 class="content-group-lg">SISTEM INFORMASI BINA PENATAAN BANGUNAN (SIBPB) <small class="display-block">Enter your credentials</small></h5>
        </div>
        <div class="form-group has-feedback has-feedback-left">
           <input id="username" type="text" placeholder="username or email" class="form-control" name="username" value="{{ old('username') }}" required>
           <div class="form-control-feedback">
              <i class="icon-user text-muted"></i>
           </div>
        </div>
        <div class="form-group has-feedback has-feedback-left">
           <input id="password" type="password" placeholder="password" class="form-control" name="password" required>
           <div class="form-control-feedback">
              <i class="icon-lock2 text-muted"></i>
           </div>
        </div>
        <div class="form-group">
          @if ($errors->has('username'))
              <span class="invalid-feedback" style="color: #F44336">
                  <strong>{{ $errors->first('username') }}</strong>
              </span>
          @endif
          @if ($errors->has('email'))
              <span class="invalid-feedback" style="color: #F44336">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
          @if ($errors->has('password'))
              <span class="invalid-feedback" style="color: #F44336">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group login-options">
           <div class="row">
              <div class="col-sm-6">
                 <label class="checkbox-inline">
                    <input type="checkbox" class="styled" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                    {{ __('Remember Me') }}
                 </label>
              </div>
              <div class="col-sm-6 text-right">
                 <a href="/password/reset">Forgot password?</a>
              </div>
           </div>
        </div>
        <div class="form-group">
           <button type="submit" class="btn bg-blue btn-block"><i class="icon-lock"></i> LOGIN</button>
        </div>
        <div class="form-group">
           <a href="/" class="btn bg-teal btn-block"><i class="icon-arrow-left15"></i> HALAMAN DEPAN</a>
        </div>
        <span class="help-block text-center no-margin">
           &copy; 2018 <br/>
           Kementrian Pekerjaan Umum dan Perumahan rakyat 
           Direktorat Jenderal Cipta Karya. Direktorat Bina Penataan Bangunan 
           Subdirektorat Perencanaan Teknis.
           Jl. Pattimura No. 20, Kebayoran Baru, Jakarta Selatan, 12110 
        </span>
     </div>
 {{ Form::close() }}
@endsection