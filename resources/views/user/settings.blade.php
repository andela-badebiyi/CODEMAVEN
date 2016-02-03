@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
	<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">Settings</h2>
      @include('partials.dashboard_flash')
      <div class='row' style="margin-top:3em;">
        {!! Form::open(['url' => '/settings', 'method' => 'post']); !!}
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
          <div class='col-xs-12' style="margin-top:2em;">
            <button type='submit' class='btn fa fa-floppy-o' style="background-color:#e89980; color:white;"> Save my settings </button>
            <button class='btn btn-danger fa fa-trash-o'> Delete My Account </button>
          </div>
        {!! Form::close(); !!}
      </div>
    </div>

  </div>
@endsection
