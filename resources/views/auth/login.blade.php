@extends('layouts.master')
@section('title', 'Sign Up')

@section('content')
<div class="row">
	<div class="12u">
	@include('partials.form_login')
	@include('partials.social_login')
	</div>
</div>

<style>
	div.row{
		margin-top:5em;
	}
	.field{
		width:50%;
		margin-right:auto;
		margin-left:auto;
	}
</style>
@endsection

@section('js')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
@endsection
