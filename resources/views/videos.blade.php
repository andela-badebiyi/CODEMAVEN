@extends('layouts.master')
@section('title', 'All Videos')
<div class='view-videos'>
  <form action='/search' method='post'>
  <div class='row' style='margin-bottom:2em'>
      {!! csrf_field() !!}
      <div class='col-xs-9'>
        <input type='text' name='query' placeholder='search videos' style="border-color: " />
      </div>
      <div class='col-xs-3'>
        <button type='submit' class='fa fa-search btn btn-primary btn-block'
        style='height:3em; background-color:#e89980; border-color:#e89980;'> Search </button>
      </div>
  </div>
  </form>
  @if(isset($query))
    <h3>Search: {{$query}} </h3>
  @endif
  @if(count($videos) == 0)
    <p style='color:red;' class ='fa fa-frown'> No Videos Found </p>
  @endif
  @include('partials.video_list')
</div>

<style>
  .view-videos{
    width: 80%;
    margin-top: 3em;
    margin-left: auto;
    margin-right: auto;
    padding: 3em 3em 3em 3em;
  }
</style>
