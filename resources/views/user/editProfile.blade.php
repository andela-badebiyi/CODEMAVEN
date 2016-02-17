@extends('layouts.dashboard')
@section('title', 'Edit Profile')

@section('details')
	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
		<i class='fa fa-user'></i> Profile
	</h2>
  @include('partials.dashboard_flash')
	<div class='profile-container'>
		<form action='/profile' method='post' enctype="multipart/form-data">
    {!! csrf_field() !!}
		@if( !isset($user->avatar) || $user->avatar == null )
			<img src='{{ asset("img/placeholder.png") }}' width=200 height=200 />
		@else
			<img src='{!! $user->avatar !!}' width=200 height=200/>
		@endif
		<br/>
    <input type='file' name='avatar' id='upload'>
		<a href='javascript:void(0)' id='upload-button' class='fa fa-plus btn btn-info' style='margin-bottom:1em; display:none;'> Select Profile Picture</a>
    <span id='upload-label' style='display:none; color:#00B300;'>File Selected!</span>
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
@endsection

  @section('css')
    @parent
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
  @endsection

  @section('js')
	  <script src="{!! asset('js/profile.js') !!}"></script>
    <script src='https://code.jquery.com/ui/1.11.4/jquery-ui.min.js'></script>
  @endsection
