@extends('layout.frontRide')
@section('title', 'Offer')
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="page-sub-title textcenter">
            <h2>Offer</h2>
            <div class="line"></div>
        </div>
    </div>
    <div class="col-md-7 col-sm-7 col-xs-12">

        <div class="page-content">
            @if(Session::has('error'))
           
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Danger!</strong> {{ Session::get('error') }}
            </div>
            @endif
            {!! Form::open(array('method'=>'post','route'=>'offer.ride.post', 'class'=>'idealforms searchtours','autocomplete'=>'off')) !!}
            <div class="field">
                <label class="labelRequired">Pick-up Location</label>                
                {!! Form::text('offer_source','', ['id'=>'offer_source','placeholder'=>'Pick-up Location', 'autocomplete'=>"on"]) !!}                
                @if ($errors->has('offer_source'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>
            <div class="field">
                <label class="labelRequired">Drop-off Location</label>
                {!! Form::text('offer_destination','', ['id'=>'offer_destination','placeholder'=>'Drop-off Location', 'autocomplete'=>"on"]) !!}                
                @if ($errors->has('offer_destination'))
                <div class="val_error">{{ 'This field is required' }}</div>
                @endif
            </div>

            <div class="field">
                <label class="labelRequired">Schedule Date</label>
                {!! Form::text('schedule_date','', ['id'=>'schedule_date','placeholder'=>'Date','class'=>"datepicker",'autocomplete'=>"on"]) !!}                                
                @if ($errors->has('schedule_date'))
                <div class="val_error">{{ 'This field is required or you have entered past date' }}</div>
                @endif
            </div>

            <div class="field">
                <label class="labelRequired">Schedule Time</label>
                <div class="input-group bootstrap-timepicker timepicker">
                    {!! Form::text('scheduleTime','', ['id'=>'scheduleTime','placeholder'=>'Time','class'=>"form-control input-small"]) !!}                                                    
                </div>
                @if ($errors->has('scheduleTime'))
                <div class="val_error">{{ 'This field is required and date must be of future date' }}</div>
                @endif
            </div>

            <div class="field">
                <label></label>
                <label class="labelRequired">Price Per Traveller</label>                
                {!! Form::text('fare','', ['id'=>'fare','placeholder'=>'Fare']) !!}               
                @if ($errors->has('fare'))
                <div class="val_error">{{ 'This field is required and must be a numeric' }}</div>
                @endif
            </div>

            <div class="field">
                <label class="labelRequired">Number of Seats</label>
                {!! Form::selectRange('seats', 1, 4, null, []) !!}
                @if ($errors->has('seats'))
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
    <div class="col-md-5 col-sm-5 col-xs-12">
        <div style="width:auto;height:350px" id="map_offer"></div>
        @if(Sentinel::check() && isset($user) && count($user))
        <br>
        <div class='panel panel-body panel-success'>
            <div class="col-sm-12">
                <div class="col-sm-5"><label>Owner Name :</label></div>
                <div class="col-sm-7">
                    <label>
                        <?php
                        $first_name = isset($user['first_name']) ? $user['first_name'] : '';
                        $last_name = isset($user['last_name']) ? $user['last_name'] : '';
                        $fullname = !empty($first_name) ? $first_name . (!empty($last_name) ? ' ' . $last_name : '') : '';
                        ?>
                        {!! $fullname !!}
                    </label></div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-5"><label>Owner Email :</label></div>
                <div class="col-sm-7"><label>{!! isset($user['email']) ? $user['email'] : '' !!}</label></div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-5"><label>Last Login :</label></div>
                <div class="col-sm-7"><label>{!! isset($user['last_login']) && strtotime($user['last_login']) ? date('d/m/Y H:i A',strtotime($user['last_login'])) : '' !!}</label></div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-5"><label>Rating :</label></div>
                <div class="col-sm-7"><label>{!! 'NA' !!}</label></div>
            </div>
        </div>
        @endif
    </div>
</div>
@stop
@section('custom_css')
<link href="{{asset('/public/css/custom.css')}}" rel="stylesheet">
<link href="{{asset('/public/css/bootstrap-timepicker.min.css')}}" rel="stylesheet">
@stop
@section('custom_js')
<script type="text/javascript" src="{{asset('/public/js/bootstrap-timepicker.min.js')}}"></script>
<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO0OuZWfr-qE790TVsHcd8n-OkF-XHp1w&libraries=places&callback=initMap"></script>
<script type="text/javascript" src="{{asset('/public/js/offer.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/distancematrix/json?origins=Delhi&destinations=Chandigarh&mode=driving&key=AIzaSyBO0OuZWfr-qE790TVsHcd8n-OkF-XHp1w"></script>
@stop
