@extends('layout.frontRide')
@section('title', 'Personal Details')
@section('content')

<?php
$fullname = '';
if (isset($user) && count($user)) {
    $first_name = isset($user['first_name']) ? $user['first_name'] : '';
    $last_name = isset($user['last_name']) ? $user['last_name'] : '';
    $fullname = !empty($first_name) ? $first_name . (!empty($last_name) ? ' ' . $last_name : '') : '';
}

?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="page-sub-title textcenter">
            <h2>Personal Details</h2>
            <div class="line"></div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="page-content">
            @if(Session::has('error'))           
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Danger!</strong> {{ Session::get('error') }}
            </div>            
            @endif
            @if(Session::has('message'))           
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{ Session::get('message') }}
            </div>
            @endif
            {!! Form::open(array('method'=>'post','route'=>'user.details', 'class'=>'idealforms searchtours','autocomplete'=>'off')) !!}            
            <div class="field">
                <label class="labelRequired">First name</label>                
                {!! Form::text('first_name', isset($user['first_name']) ? $user['first_name'] : '', ["placeholder"=>"Enter first name"]) !!}
                @if ($errors->has('first_name'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            <div class="field">
                <label class="labelRequired">Last name</label>
                {!! Form::text('last_name', isset($user['last_name']) ? $user['last_name'] : '', ["placeholder"=>"Enter last name"]) !!}
                @if ($errors->has('last_name'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            <div class="field">
                <label class="labelRequired">Email</label>
                {!! Form::text('email', isset($user['email']) ? $user['email'] : '', ["placeholder"=>"Enter email address", "readonly"=>"readonly"]) !!}      	
                @if ($errors->has('email'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            
            <div class="field">
                <label class="labelRequired">Birth Year</label>
                {!! Form::selectYear('birth_year', date('Y',strtotime('-50 years')), date('Y',strtotime('-18 years')),isset($userDetail['birth_year']) ? $userDetail['birth_year'] : '') !!}
                @if ($errors->has('birth_year'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            
            <div class="field">
                <label></label>
                <label class="labelRequired">Contact Number</label>
                {!! Form::text('phone_num', isset($userDetail['phone']) ? $userDetail['phone'] : '', ["placeholder"=>"Enter contact number"]) !!}
                @if ($errors->has('phone_num'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            
            <div class="field">
                <label class="labelRequired">Gender</label>
                {!! Form::select('gender', array(''=>'Gender','Male'=>'Male','Female'=>'Female') ,isset($userDetail['gender']) ? $userDetail['gender'] : '',array()); !!}
                @if ($errors->has('gender'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            
            <div class="field">
                <label></label>
                <label class="labelRequired">Notification to parents</label>
                {!! Form::select('notification', array(''=>'Notification to Parents','1'=>'Yes','0'=>'No') ,isset($userDetail['notification_to_parents']) ? $userDetail['notification_to_parents'] : '',array()); !!}
                @if ($errors->has('notification'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>

            <div class="field buttons">
                <label></label>
                <button type="submit" class="btn-sm btn-flat btn green-color">Submit</button>
            </div>
            <div class="field">
                <label></label>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop