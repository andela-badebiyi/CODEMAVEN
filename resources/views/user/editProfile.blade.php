@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
	<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
    	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    		Profile
    	</h2>
    	<div class='profile-container'>
    		<form action='/edit' method='post'>
    		@if( !isset($user->avatar) || $user->avatar == null )
    			<img src='{{ asset("img/placeholder.png") }}' />
    		@else
    			<img src='{!! $user->avatar !!}' />
    		@endif
    		<br/>
    		<a href='javascript:void(0)' class='fa fa-plus btn btn-info' style='margin-bottom:1em;'> Select Profile Picture</a>

    		<div class="panel panel-info">
    			<div class="panel-heading">
    				<h3> Profile Details </h3>
    			</div>

    			<div class="panel-body">
    				<p> 
    					<strong>Name</strong><br/>
    					<span>{{ $user->name }}</span>
    					<input type='text' name='name' value='{{ $user->name }}' style='display:none;'>
    				</p>

            <p> 
              <strong>Age</strong><br/>
              <span>23</span>
              <input type='text' name='age' value='' style='display:none;'>
            </p>

    				<p> 
    					<strong>Occupation</strong><br/> 
    					<span>Lawyer</span>
    					<input type='text' name='occupation' value='' style='display:none;'>
    				</p>
    				<p> 
    					<strong>Location</strong><br/> 
    					<span>Unknown</span>
    					<input type='text' name='location' value='' style='display:none;'>
    				</p>
    				<p> 
    					<strong>Favourite Stack</strong><br/>
    					<span>Java </span>
    					<input type='text' name='favstack' value='' style='display:none;'>
    				</p>
    				<p> 
    					<strong>About Me</strong><br/>
    					<span>None</span>
    					<textarea type='text' name='about' style='display:none;'></textarea>
    				</p>
    				<input type='submit' value='Save Details' class='button special' style="display:none;">
    			</div>
    		</div>

    		<a href="javascript:void(0)" id='edit-profile' class='btn btn-primary fa fa-pencil-square-o'> Edit Profile</a>
    		</form>
    	</div>
    </div>

  </div>

  @section('css')
  <style>
  .profile-container{
  	border: solid thin #ccc;
  	border-radius: 10px 10px 10px 10px;
  	min-height:10em;
  	margin-bottom: 5em;
  	text-align:center;
  	padding:2em 2em 2em 2em;
  }
  .profile-container > img{
  	margin-top:1em;
  	border:solid medium #000;
  }
  .panel{
  	text-align: justify;
  }
  .panel-heading > h3 {
  	margin-bottom: 0;
  }
  .panel-body p {
  	margin-bottom: 1em;
  }
  input, textarea{
  	max-width: 17em;
  }
  </style>
  @endsection
  @section('js')
	  <script>
	  $(document).ready(function(){
	  	$('#edit-profile').click(function(){
	  		console.log('clicked');
	  		$('input').toggle('slow');
        $('textarea').toggle('show');
	  		$('p span').toggle();
	  		
	  		if ($(this).html() === " Edit Profile") {
	  			$(this).removeClass('fa-pencil-square-o');
	  			$(this).addClass('fa-times');
	  			$(this).html(' Cancel');
	  		} else {
	  			$(this).removeClass('fa-times');
	  			$(this).addClass('fa-pencil-square-o');
	  			$(this).html(" Edit Profile");
	  		}
	  		return false;
	  	});
	  });
	  </script>
  @endsection
@endsection
