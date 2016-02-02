@extends('layouts.master')
@section('title', $user->name . ' - profile')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12'>
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Profile
      </h2>
    </div>
  </div>

  <div class='profile-container'>
    <div class='row'>
      <div class='col-xs-12 col-md-4' >
        <a href='/{{$user->username}}' class='btn btn-primary btn-block fa fa-user active'> View Profile</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/videos' class='btn btn-primary btn-block fa fa-film'> View Videos</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/messages' class='btn btn-primary btn-block fa fa-envelope'> Send Message</a>
      </div>
      <div class='col-xs-12 text-center' style="margin-top:2em;">
        @if( !isset($user->avatar) || $user->avatar == null )
          <img src='{{ asset("img/placeholder.png") }}' width=300 height=300 />
        @else
          <img src='{!! $user->avatar !!}' width=300 height=300/>
        @endif
      </div>
    </div>
    <br/>

    <div class='row'>
      <div class='col-xs-12'>
        <div class="panel panel-info">
          <div class="panel-heading">
            <h3> Profile Details </h3>
          </div>

          <div class="panel-body">
            <p>
              <strong>Name</strong><br/>
              <span>{{ $user->name }}</span>
            </p>

            <p>
              <strong>Date Of Birth</strong><br/>
              <span>{{ $user->dob }}</span>
            </p>

            <p>
              <strong>Occupation</strong><br/>
              <span>{{ $user->occupation }}</span>
            </p>
            <p>
              <strong>Location</strong><br/>
              <span>{{ $user->location }}</span>
            </p>
            <p>
              <strong>Favourite Stack</strong><br/>
              <span>{{ $user->favstack }} </span>
            </p>
            <p>
              <strong>About Me</strong><br/>
              <span>{{ $user->bio }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .view-videos{
    width: 80%;
    margin-top: 3em;
    margin-left: auto;
    margin-right: auto;
    padding: 3em 3em 3em 3em;
  }
  profile-container{
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
    margin-left: auto;
    margin-right:auto;
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
  .active{
    background-color:#2e6da4;
  }
</style>
