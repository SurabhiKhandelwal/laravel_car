@extends('layout.FrontMaster')
@section('title','Forgot Password')
@section('overwritesection')
<link rel="stylesheet" href="{{asset('/public/theme/dist/css/AdminLTE.min.css')}}">
@stop
@section('content')
<link rel="stylesheet" href="{{asset('/public/css/custom.css')}}">
<div class="login-box">
    <div class="well">
        <div class="login-box-body">
            <p class="login-box-msg">Forget Password</p>
            @include('errors.errorlist')
            {!!Form::open(array('method'=>'post','route'=>'resend.password'))!!}
            <div class="form-group has-feedback">
                <label>Please enter your registered email address</label>
                <input name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
               
            </div>
            <div class="form-group has-feedback">
                <button type="submit" value="login" class="btn btn-success btn-block btn-flat">Continue</button>
            </div>
            {!!Form::close()!!}
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="{{URL::to('login')}}" class="btn btn-block btn-primary">Log In</a>
                <a href="{{URL::route('register')}}" class="btn btn-block btn-primary">Signup</a>
            </div><!-- /.social-auth-links -->
        </div>
    </div>
</div>
@stop


