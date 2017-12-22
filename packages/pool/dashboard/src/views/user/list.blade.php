@extends('layout.master')
@section('title', 'Admin Dashboard')
@section('content')

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Users</h3>
    <div class="box-tools pull-right">
     
      
    </div>
  </div><!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="table-responsive">
      <table class="table no-margin table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Last login</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if(isset($users) && !empty($users) && $users->count())
            @foreach ($users as $user)
            <tr>
              <td>{{ isset($user->first_name) ? $user->first_name : ''}}{{ isset($user->last_name) ? ' '.$user->last_name : ''}}</td>
              <td>{{ isset($user->email) ? $user->email : ''}}</td>
              <td><span class="label label-default">Active</span></td>
              <td>{{ isset($user->last_login) && strtotime($user->last_login) ? date('m/d/Y',strtotime($user->last_login)) : ''}}</td>
              <td>
                <div class="btn-group">
                      <button type="button" class="btn btn-default">Action</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
              </td>
            </tr>
            @endforeach
          @else
            <tr><td colspan="5">Record not available</td></tr>
          @endif
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  </div><!-- /.box-body -->
  <div class="box-footer clearfix">
    {!! (isset($users) && !empty($users)) ? $users->render() : '' !!}
  </div><!-- /.box-footer -->
</div>

@stop