@extends('layout.masterauth')
@section('title','Login')
@section('content')
<div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        @include('errors.errorlist')
        {!!Form::open(array('method'=>'post'))!!}
          <div class="form-group has-feedback">
            <input name="email" class="form-control" placeholder="Email" type="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" class="form-control" placeholder="Password" type="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <input type="checkbox" name="remember">
                <strong>Remember Me</strong>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" value="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        {!!Form::close()!!}

        <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{ url('login/facebook')}}" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div>
      </div>

@stop


