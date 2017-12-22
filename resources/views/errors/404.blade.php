<?php header("HTTP/1.0 404 Not Found"); ?>
@extends('layout.masterauth')
@section('title','Page Not Found')
@section('overwritesection')
<link rel="stylesheet" href="{{asset('/public/theme/dist/css/AdminLTE.min.css')}}">
@stop
@section('content')
<link rel="stylesheet" href="{{asset('/public/css/custom.css')}}">
<div class="login-box">
    <div class="well">
        <div class="login-box-body">
            <h1 class="text-center text-yellow">
                404 Error Page
            </h1>
            <h3 class="text-center"><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
            <br/>
            <p class="text-justify">
                We could not find the page you were looking for.
                <a href="{{URL::to('/')}}">
                    Click here
                </a>
                to return to the home page.
            </p>
        </div>
    </div>
</div>
@stop