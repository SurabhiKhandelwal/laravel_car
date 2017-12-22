@if ($errors->has())
<?php
$errorsToDisplay = $errors->all();
$errorsToDisplay = array_unique($errorsToDisplay);

?>
<div class="alert alert-danger">
    Please correct the following errors before moving forward.
    <ul>
        @foreach ($errorsToDisplay as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if(Session::has('message'))
<div id="closeAlert" class="alert alert-box alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('message') }}
<?php Session::forget('message'); ?>
</div>
@endif