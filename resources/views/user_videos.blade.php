@extends('layouts.master')
@section('title', $user->name.' - videos')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/user_profile.css') !!}" />
@endsection

@section('content')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12' style="padding: 0 0 0 0 !important">
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Videos
      </h2>
    </div>
  </div>

  <div class='row' style='margin-bottom:2em;'>
    <div class='col-xs-12 col-md-4' style="padding: 0 0.2em 0.2em 0.2em !important;">
      <a href='/{{$user->username}}' class='btn btn-primary btn-block fa fa-user'> View Profile</a>
    </div>
    <div class='col-xs-12 col-md-4' style="padding: 0 0.2em 0.2em 0.2em !important;">
      <a href='/{{$user->username}}/videos' class='btn btn-primary btn-block fa fa-film active'> View Videos</a>
    </div>
    <div class='col-xs-12 col-md-4' style="padding: 0 0.2em 0.2em 0.2em !important;">
      <a href='/{{$user->username}}/messages' class='btn btn-primary btn-block fa fa-envelope'> Send Message</a>
    </div>
  </div>

    @include('partials.video_list')
</div>
@endsection