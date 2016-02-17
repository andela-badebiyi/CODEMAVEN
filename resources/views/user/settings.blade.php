@extends('layouts.dashboard')
@section('title', 'Account Settings')

@section('details')
<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
  <i class='fa fa-cog'></i> Settings
</h2>
@include('partials.dashboard_flash')
<div class='row' style="margin-top:3em;">
  <div class='col-xs-12'>
    <form action="{{url('/settings')}}" method='post'>
    {!! csrf_field(); !!}
    <div class='col-xs-12'>
      {!! Form::checkbox('donotnotifymessage', 1,
      $settings->donotnotifymessage == 1 ? true : false); !!}
      Do not send me mail notifications
    </div>
    <div class='col-xs-12'>
      {!! Form::checkbox('disablemessages', 1,
      $settings->disablemessages == 1 ? true : false); !!}
      Disable messaging
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:1em">
      <label for='username'>
        Enter a new username
      </label>
      <input type='text' name='username' value='{{$user->username}}'>
    </div>
    <div class="col-xs-6" style="margin-top:2em;">
      <button type='submit' name='submit' class='btn fa fa-floppy-o' style="background-color:#e89980; color:white;"> Save my settings </button>
    </div>
    </form>
    <div class='col-xs-6' style="margin-top:2em;">
      {!! Form::open(['url' => '/deleteaccount', 'method' => 'delete']); !!}
      <button type='submit' class='btn btn-danger fa fa-trash-o'> Delete My Account </button>
      </form>
    </div>
  </div>
</div>
@endsection
