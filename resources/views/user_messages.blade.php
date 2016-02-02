@extends('layouts.master')
@section('title', $user->name.' - messages')
<div class='view-videos'>
  <div class='row'>
    <div class='col-xs-12'>
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{ $user->name }} - Messages
      </h2>
    </div>
  </div>

  <div class='profile-container'>
    <div class='row' style='margin-bottom:2em;'>
      <div class='col-xs-12 col-md-4' >
        <a href='/{{$user->username}}' class='btn btn-primary btn-block fa fa-user'> View Profile</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/videos' class='btn btn-primary btn-block fa fa-film'> View Videos</a>
      </div>
      <div class='col-xs-12 col-md-4'>
        <a href='/{{$user->username}}/messages' class='btn btn-primary btn-block fa fa-envelope active'> Send Message</a>
      </div>

      <div class='col-xs-12' style='margin-top:2em;'>
        @include('partials.dashboard_flash')
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
