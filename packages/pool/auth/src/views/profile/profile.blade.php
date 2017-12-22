@extends('layout.master')
@section('title', 'Your Profile')
@section('content')
@include('errors.errorlist')
@if(Session::has('message'))
<div id="closeAlert" class="alert alert-box alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('message') }}
</div>
<br/>
@endif
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                {!! Form::open( array('route' => array('admin.users.update', $users->id ),'role' => 'form','method' => 'PUT')) !!}
                <div class='form-group'>
                    {!! Form::label('firstname', 'First Name') !!}
                    {!! Form::text('first_name',$users->first_name, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('lastname', 'Last Name') !!}
                    {!! Form::text('last_name',$users->last_name, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('email', 'Email_id') !!}
                    {!! Form::email('email',$users->email, ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label('password', 'Password') !!}
                     {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class='form-group'>
                    {!! Html::link('/admin/users', 'Cancle', ['class' => 'btn btn-danger'])!!}
                     <div class="pull-right">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop