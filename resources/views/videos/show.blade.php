@extends('layouts.master')

@if (Auth::check())
	@section('title', 'My Videos')
	@section('content')
	<div class="row con" style="margin-top:4em;">
		@include('partials.dashboard_nav')

		<div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
			<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
				{{$video->title}}
			</h2>
			<p><a href='/videos' class='button fa fa-arrow-left'>  Back to Videos</a></p>
	  		@include('partials.show_video')
    	</div>
	</div>
	@endsection
	@section('css')
		<link rel="stylesheet" href="{!! asset('css/dashboard.css') !!}" >
  		<link rel="stylesheet" href="{!! asset('css/show_video.css') !!}" />
	@endsection
@else
	@section('title', 'All Videos')
	@section('content')
		<div class='view-videos'>
			<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
				{{$video->title}}
			</h2>
			<p><a href='/allvideos' class='button fa fa-arrow-left'>  Back to all Videos</a></p>
			@include('partials.show_video')
		</div>
	@endsection
	@section('css')
  		<link rel="stylesheet" href="{!! asset('css/show_video.css') !!}" />
	@endsection
@endif

@section('js')
	<script src="{!! asset('js/show_video.js') !!}"> </script>
@endsection
