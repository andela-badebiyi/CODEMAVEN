@extends('layouts.master')
@section('title', '404 - page not found')
@section('content')
<div class="wrap" style="margin-top:6em;">
	<div class="content">
		<div class="logo">
			<h1><a href="#"><img src="{!! asset('img/images/logo.png') !!}"/></a></h1>
			<span><img src="{!! asset('img/images/signal.png') !!}"/>Oops! The Page you requested was not found!</span>
		</div>
		<div class="buttom">
			<div class="seach_bar">
				<p>you can go to <span><a href="/">home</a></span></p>
			</div>
		</div>
	</div>
</div>
@endsection
@section('css')
	<link href="{!! asset('css/404.css') !!}" rel="stylesheet" type="text/css" media="all" />
@endsection