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

<style>
	#login{
		background-color: rgba(240, 240, 240, 0.5);
		border-radius: 4px 4px 4px 4px;
		margin-right: auto;
		margin-left: auto;
		margin-top: 1em;
	}

	div.row{
		margin-top:5em;
		min-height: 100% !important;
		margin-bottom: 4em;
		padding-bottom: 1em;
	}
	.field{
		padding: 0 1em 0 1em;
		margin-right:auto;
		margin-left:auto;
		margin-bottom: 1em;
	}
	body{
		background-image: url('http://middleeast.etoninstitute.com/wp-content/uploads/2015/06/computer-training.jpg');
	}
</style>
@endsection

@section('js')
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
@endsection
