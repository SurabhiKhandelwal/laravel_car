@extends('layout.FrontMaster')
@section('title','Registration')
@section('overwritesection')
<link rel="stylesheet" href="{{asset('/public/theme/dist/css/AdminLTE.min.css')}}">
@stop
@section('content')
<link rel="stylesheet" href="{{asset('/public/css/custom.css')}}">
<div class="login-box">
    <div class="well">
        <div class="login-box-body">
            <p class="login-box-msg">Sign up for the Revolution Now!</p>
            @include('errors.errorlist')
            {!!Form::open(array('method'=>'post'))!!}
            <div class="form-group has-feedback">
                {!! Form::text('first_name',null,['placeholder'=>'First Name','class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <span class="label label-default">
                    <span class="required">First Name</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('last_name',null,['placeholder'=>'Last Name','class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                <span class="label label-default">
                    <span class="required">Last Name</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('email',null,['placeholder'=>'Email','class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="label label-default">
                    <span class="required">Email</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('email_confirmation',null,['placeholder'=>'Confirm Email','class' => 'form-control']) !!}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="label label-default">
                    <span class="required">Confirm Email</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('phone_1',null,['placeholder'=>'Primary Phone','class' => 'form-control phone']) !!}
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                <span class="label label-default">
                    <span class="required">Primary Phone</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::text('phone_2',null,['placeholder'=>'Secondary Phone','class' => 'form-control phone']) !!}
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                <span class="label label-default">
                    <span class="">Secondary Phone</span>
                </span>
            </div>
            <div class="form-group has-feedback">
                {!! Form::select('timeframe',ControlTable::getList('Timeframe'),null,['class' => 'form-control']) !!}
                <span class="label label-default">
                    <span class="required">Timeframe for Buying/Selling?</span>
                </span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    {!! Form::submit('Register', ['class' => 'btn btn-primary btn-block btn-flat']) !!}
                </div>
            </div>
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a class="btn btn-block btn-social btn-facebook btn-flat" href="{{URL::route('auth.getSocialAuth','facebook')}}">
                    <i class="fa fa-facebook"></i> Sign up with Facebook
                </a>
            </div>
        </div>
    </div>
</div>
@stop