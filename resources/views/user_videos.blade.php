@extends('layouts.master')
@section('title', $user->name.' - videos')
@section('content')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12'>
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Videos
      </h2>
    </div>
  </div>

  <div class='profile-container'>
    <div class='row' style='margin-bottom:2em;'>
      <div class='col-xs-12 col-md-4' >
        <a href='/{{$user->username}}' class='btn btn-primary btn-block fa fa-user'> View Profile</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/videos' class='btn btn-primary btn-block fa fa-film active'> View Videos</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/messages' class='btn btn-primary btn-block fa fa-envelope'> Send Message</a>
      </div>
    </div>
    @include('partials.video_list')
  </div>
</div>
@endsection

  <style>
    .view-videos{
      width: 100%;
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
