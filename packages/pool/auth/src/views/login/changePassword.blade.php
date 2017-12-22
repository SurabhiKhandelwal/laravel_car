@extends('layout.masterauth')
@section('content')
<p class="login-box-msg">Change your password to continue!</p>
@include('errors.errorlist')
{!!Form::open(array('method'=>'post','route'=>'initial.change.password'))!!}
<input type="hidden" name="code" value="{{$code}}">
<input type="hidden" name="id" value="{{$id}}">
<div class="form-group has-feedback">
    <input type="password" name="password" class="form-control" placeholder="Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
    <button type="submit" value="login" class="btn btn-success btn-block btn-flat">Continue</button>
</div>
{!!Form::close()!!}
@stop