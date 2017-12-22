<h3 class="head text-center">Vehicle Details</h3>
{!! Form::open(array('method'=>'post','route'=>'user.details', 'class'=>'idealforms searchtours','autocomplete'=>'off')) !!}

<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
   		{!! Form::text('registration_number', isset($user['registration_number']) ? $user['registration_number'] : '', ["placeholder"=>"Enter vehicle registration number"]) !!}
   	</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
      	{!! Form::text('vehicle_name', isset($user['vehicle_name']) ? $user['vehicle_name'] : '', ["placeholder"=>"Enter vehicle name"]) !!}
   	</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
   		{!! Form::text('vehicle_color', isset($user['vehicle_color']) ? $user['vehicle_color'] : '', ["placeholder"=>"Enter vehicle color"]) !!}      	
   	</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
   		{!! Form::text('owner_phone', null, ["placeholder"=>"Enter contact number"]) !!}
   	</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
   		{!! Form::select('seats', array(''=>'Number of seats','1'=>'1','2'=>'2','3'=>'3') ,null,array()); !!}
   	</div>
</div>
<div class="col-md-4 col-sm-4 col-xs-12">
   	<div class="field">
   		{!! Form::text('fare', null, ["placeholder"=>"Enter fare per seat"]) !!}
   	</div>
</div>


{!!Form::close()!!}
<p class="text-center">
 <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
</p>

