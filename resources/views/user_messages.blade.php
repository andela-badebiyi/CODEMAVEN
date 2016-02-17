@extends('layouts.master')
@section('title', $user->name.' - messages')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/user_profile.css') !!}" />
@endsection

@section('content')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12' style="padding: 0 0 0 0 !important">
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Messages
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

    <div class="row">
      <div class='col-xs-12'  style="padding: 0 0 0 0 !important;">
        @include('partials.dashboard_flash')
        @if($user->settings()->first()->disablemessages == 0)
          <form action='/{{$user->username}}/messages' method='post'>
            {!! csrf_field() !!}
            <div class'form-action'>
              <label for='name'>Name</label>
              <input type='text' name='name'>
            </div>

            <div class'form-action'>
              <label for='email'>Email</label>
              <input type='text' name='email'>
            </div>

            <div class'form-action'>
              <label for='subject'>Subject</label>
              <input type='text' name='subject'>
            </div>

            <div class'form-action'>
              <label for='message'>Message</label>
              <textarea name='message' rows=8></textarea>
            </div>

            <div class'form-action' style='margin-top:1em;'>
              <button type='submit' class='btn fa fa-paper-plane' style="background-color:#e89980;"> Send Message</button>
            </div>
          </form>
        @else
          <p style="color:red">This user has disabled this feature</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection

