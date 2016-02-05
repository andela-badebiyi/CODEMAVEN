@extends('layouts.master')
@section('title', '500 - Oops')
@section('content')
<div class="wrap" style="margin-top:6em;">
	<div class="content">
		<div class="logo">
			<h1 id='error-label'>500</h1>
			<span><img src="{!! asset('img/images/signal.png') !!}"/>Oops, something went wrong from our end, please try again</span>
		</div>
		<div class="buttom">
			<div class="seach_bar">
				<p>you can go to <span><a href="/">home</a></span></p>
			</div>
		</div>
	</div>
</div>
<style>
	#error-label{
		font-size: 10em;
		color: #fff;
	}
</style>
@endsection
@section('css')
	<link href="{!! asset('css/404.css') !!}" rel="stylesheet" type="text/css" media="all" />
@endsection