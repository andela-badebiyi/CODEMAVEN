@extends('layouts.master')
@section('title', 'Sign Up')

@section('content')
<div class="row">
	<div class="12u">
		<form method="POST" action="/login">
		<h2 class='align-center' style='border-bottom: solid 2px #e5e5e5;'>Login</h2>
		    {!! csrf_field() !!}
		    <div class="field">
		    	@if (count($errors) > 0)
			    	<div class="alert alert-danger fade in">
	  					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    		@foreach($errors->all() as $error)
							<li> {{ $error }} </li>
						@endforeach
					</div>
				@endif
		        Email
		        <input type="email" name="email" value="">
		    </div>

		    <div class="field">
		        Password
		        <input type="password" name="password">
		    </div>

		   	<div class="field">
        		<input type="checkbox" name="remember"> Remember Me
			</div>

		    <div class="field" style="margin-top:1em;">
		        <input type="submit" value="Login">
		    </div>
		</form>
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
