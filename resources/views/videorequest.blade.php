@extends('layouts.master')
@section('title', 'Send Request')
@section('content')
<div class='view-videos'>
  <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    Make A Request
  </h2>
  <div class='alert notice'>
    If you can't find a tutorial video feel free to make a request by filling
    the form below and one of our mavens might help you out. You'll get an
    email notification when your request has been granted.
  </div>
  @include('partials.dashboard_flash')
  {!! Form::open(['url' => '/request', 'method' => 'post']) !!}
    @include('partials.request_form')
  {!! Form::close() !!}
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
  div.notice{
    background-color: #e89980;
    color: #fff;
  }
</style>
