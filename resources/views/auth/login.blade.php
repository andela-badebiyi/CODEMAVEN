@extends('layouts.master')
@section('title', 'Sign In')

@section('content')
<div class="row">
	<div class='col-xs-12'>
		<div id='login'>
			@include('partials.form_login')
			@include('partials.social_login')
		</div>
	</div>
</div>
@endsection

@section('css')
	<link rel="stylesheet" href="{!! asset('css/auth.css') !!}" />
@endsection

@section('js')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
@endsection
