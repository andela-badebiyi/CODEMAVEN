@extends('layouts.master')
@section('title', $user->name . ' - profile')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/user_profile.css') !!}" />
@endsection

@section('content')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12' style="padding: 0 0 0 0 !important">
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Profile
      </h2>
    </div>
  </div>

    <div class='row'>
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

    <div class='row'>
      <div class='col-xs-12 text-center' style="margin-top:2em; padding: 0 0 0 0 !important;">
        @if( !isset($user->avatar) || $user->avatar == null )
          <img src='{{ asset("img/placeholder.png") }}' width=300 height=300 />
        @else
          <img src='{!! $user->avatar !!}' width=300 height=300 class="img-thumbnail"/>
        @endif
      </div>
    </div>
    <br/>

    <div class='row'>
      <div class='col-xs-12' style="padding: 0 0 0 0 !important;">
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
@endsection
