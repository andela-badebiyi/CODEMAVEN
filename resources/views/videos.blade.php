@extends('layouts.master')
@section('title', 'All Videos')
<div class='view-videos'>
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
