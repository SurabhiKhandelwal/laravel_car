@extends('layout.frontRide')
@section('title', 'Car Details')
@section('content')

<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="page-sub-title textcenter">
            <h2>Car Details</h2>
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
            {!! Form::open(array('method'=>'post','route'=>'user.saveCarDetail', 'class'=>'idealforms searchtours','autocomplete'=>'off')) !!}            
            @if(isset($carDetail) && isset($carDetail['id']))
            <input type="hidden" name="car_id" value="{{ $carDetail['id']}}" />
            @endif
            @if(Session::has('offer'))
            <input type='hidden' name='offer' value='{{Session::get('offer')}}'/>
            @endif
            <div class="field">
                <label class="labelRequired">Registration Number</label>                
                {!! Form::text('registration_number', isset($carDetail['registration_number']) ? $carDetail['registration_number'] : '', ["placeholder"=>"Enter vehicle registration number"]) !!}
                @if ($errors->has('registration_number'))
                <div class="val_error">{{ $errors->first('registration_number') }}</div>
                @endif
            </div>
            <div class="field">
                <label class="labelRequired">Plate Number</label>
                {!! Form::text('number_plate', isset($carDetail['number_plate']) ? $carDetail['number_plate'] : '', ["placeholder"=>"Enter plate number"]) !!}
                @if ($errors->has('number_plate'))
                <div class="val_error">{{ $errors->first('number_plate') }}</div>
                @endif
            </div>

            <div class="field">
                <label class="labelRequired">Brand name</label>
                {!! Form::text('brand', isset($carDetail['brand']) ? $carDetail['brand'] : '', ["placeholder"=>"Enter brand"]) !!}
                @if ($errors->has('brand'))
                <div class="val_error">{{ $errors->first('brand') }}</div>
                @endif
            </div>

            <div class="field">
                <label class="labelRequired">Model name</label>
                {!! Form::text('model_name', isset($carDetail['model_name']) ? $carDetail['model_name'] : '', ["placeholder"=>"Enter model name"]) !!}        
                @if ($errors->has('model_name'))
                <div class="val_error">{{ $errors->first('model_name') }}</div>
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