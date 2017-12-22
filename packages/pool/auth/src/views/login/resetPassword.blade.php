@extends('layout.FrontMaster')
@section('title','Reset Password')
@section('overwritesection')
<link rel="stylesheet" href="{{asset('/public/theme/dist/css/AdminLTE.min.css')}}">
@stop
@section('content')
<div class="login-box ">
    <div class="well">
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            @include('errors.errorlist')
            {!!Form::open(array('method'=>'post','route'=>array('change.password',$id,$code)))!!}
            <div class="form-group has-feedback">
                <label>Please enter your new password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <br>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group has-feedback">
                <button type="submit" value="login" class="btn btn-primary btn-block btn-flat">Change Password</button>
            </div>
        </div>
    </div>
</div>
{!!Form::close()!!}
@stop


