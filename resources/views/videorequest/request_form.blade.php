@extends('layouts.dashboard')
@section('title', 'Resolve')

@section('details')
	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">Resolve Request</h2>
	<div class='panel panel-default'>
		<div class='panel-heading'>
			Request Info
		</div>
		<div class='panel-body'>
			<strong>Requester Name:</strong> {{$request->requester_name}}<br/>
			<strong>Requester Email:</strong> {{$request->requester_email}}<br/>
			<strong>Request Made:</strong> {{$request->created_at->diffForHumans()}}<br/>
			<strong>Video Description</strong> <br/>{{$request->description}}
		</div>
	</div>
	@include('partials.dashboard_flash')
	{!! Form::open(['url' => '/videos', 'method' => 'post']) !!}
		<input type='hidden' name='request_id' value='{{$request->id}}'>
		@include('partials.video_form')
	{!! Form::close() !!}
@endsection

@section('css')
	@parent
	<link rel='stylesheet' href='{!! asset("css/resolve.css") !!}' />
@endsection