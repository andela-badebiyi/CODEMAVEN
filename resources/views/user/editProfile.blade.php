@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
	<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
      @if (Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class='fa fa-check'></i> {{ Session::get('message') }}
        </div>
      @endif

      @if(count($errors->all()))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach($errors->all() as $error)
              <div><i class='fa fa-times'></i> {{ $error }} </div>
            @endforeach
        </div>
      @endif
    	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    		Profile
    	</h2>
    	<div class='profile-container'>
    		<form action='/profile' method='post' enctype="multipart/form-data">
        {!! csrf_field() !!}
    		@if( !isset($user->avatar) || $user->avatar == null )
    			<img src='{{ asset("img/placeholder.png") }}' width=300 height=300 />
    		@else
    			<img src='{!! $user->avatar !!}' width=300 height=300/>
    		@endif
    		<br/>
        <input type='file' name='avatar' id='upload'>
    		<a href='javascript:void(0)' id='upload-button' class='fa fa-plus btn btn-info' style='margin-bottom:1em; display:none;'> Select Profile Picture</a>

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
              <strong>Date Of Birth</strong><br/>
              <span>{{ $user->dob }}</span>
              <input type='text' name='dob'class='dob' value='{{ $user->dob }}' style='display:none;'>
            </p>

    				<p> 
    					<strong>Occupation</strong><br/> 
    					<span>{{ $user->occupation }}</span>
    					<input type='text' name='occupation' value='{{ $user->occupation}}' style='display:none;'>
    				</p>
    				<p> 
    					<strong>Location</strong><br/> 
    					<span>{{ $user->location }}</span>
    					<input type='text' name='location' value='{{ $user->location }}' style='display:none;'>
    				</p>
    				<p> 
    					<strong>Favourite Stack</strong><br/>
    					<span>{{ $user->favstack }} </span>
    					<input type='text' name='favstack' value='{{ $user->favstack }}' style='display:none;'>
    				</p>
    				<p> 
    					<strong>About Me</strong><br/>
    					<span>{{ $user->bio }}</span>
    					<textarea type='text' name='bio' style='display:none;'>{{ $user->bio }}</textarea>
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
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
  #upload{
    display:none !important;
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
        $('#upload-button').toggle();
	  		
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

      $("#upload-button").click(function(){
          console.log('clicked');
          $("#upload").trigger('click');
      });
	  });


	  </script>
    <script src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>
    <script>
      $( ".dob" ).datepicker({
        dateFormat: "yy-mm-dd"
      });
    </script>
  @endsection
@endsection
