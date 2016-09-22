@extends('layouts.master')
@section('title', 'All Videos')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/show_video.css') !!}" />
@endsection

@section('content')
  <div class='view-videos'>
    <div class='row' style='margin-bottom:2em'>
      <div class="col-xs-12 col-sm-12 col-md-12" style="padding:0 0 0 0 !important;">
        <form action='/search' method='post'>
          {!! csrf_field() !!}
          <div class='col-xs-12'>
            <div class="input-group">
              <input type='text' class='form-control' name='query' placeholder='search videos' />
              <div class="input-group-addon" style="background-color:#e89980;">
                <button type='submit' class='fa fa-search btn btn-primary btn-block' style="background-color:#e89980; border-color:#e89980;">
                  <span class='visible-sm-inline visible-md-inline visible-lg-inline'>Search</span>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if(isset($category))
    <ol class="breadcrumb">
      <li><a href="/categories">Categories</a></li>
      <li class="active">{{$category}}</li>
    </ol>
    @endif
    @if(isset($query))
      <h3>Search: {{$query}} </h3>
    @endif
    @if(count($videos) == 0)
      <p style='color:red;' class ='fa fa-frown'> No Videos Found </p>
    @endif
    @include('partials.video_list')
  </div>
@endsection
