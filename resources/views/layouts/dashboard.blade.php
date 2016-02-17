@extends('layouts.master')
@section('title', 'Messages')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/dashboard.css') !!}" />
@endsection

@section('content')
<div class="row con" style="margin-top:4em;">
	@include('partials.dashboard_nav')

	<div class=" col-xs-12 col-md-9 col-sm-12 col-lg-9" style="padding:0 3em 0 3em;">
		@yield('details')
	</div>
</div>
@endsection