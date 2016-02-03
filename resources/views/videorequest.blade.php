@extends('layouts.master')
@section('title', 'Send Request')

<div class='view-videos'>
  <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    Make A Request
  </h2>
  <div class='alert'>
    If you can't find a tutorial video feel free to make a request by filling
    the form below and one of our mavens might help you out. You'll get an
    email notification when your request has been granted.
  </div>
  @include('partials.dashboard_flash')
  {!! Form::open(['url' => '/request', 'method' => 'post']) !!}
  <div class=''>
    <label for='requester_name'>Your Name</label>
    <input type='text' name='requester_name'>
  </div>
  <div class=''>
    <label for='requester_email'>Your Email</label>
    <input type='email' name='requester_email'>
  </div>
  <div class=''>
    <label for='description'>Describe Video</label>
    <textarea name='description'></textarea>
    <button type='submit' class = 'btn fa fa-paper-plane'
    style='background-color:#e89980; margin-top:2em'> Post Request</button>
  </div>
  {!! Form::close() !!}
</div>

<style>
  .view-videos{
    width: 80%;
    margin-top: 3em;
    margin-left: auto;
    margin-right: auto;
    padding: 3em 3em 3em 3em;
  }
  div.alert{
    background-color: #e89980;
    color: #fff;
  }
</style>
