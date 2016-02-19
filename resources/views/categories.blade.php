@extends('layouts.master')
@section('title', 'All Categories')

@section('css')
  <link rel="stylesheet" href="{!! asset('css/request_form.css') !!}" />
@endsection

@section('content')
  <div class='view-videos'>
    <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
      Categories
    </h2>
    <div class='row' style="margin: 0 0 0 0;">
      @foreach($categories as $category)
        @include('partials.category_thumbnails')
      @endforeach
    </div>
  </div>
<style>
    .cat  img {
      max-width: 90%;
      height:15em;
    }

    .cat strong{
        font-weight: bold;
        font-size: 120%;
    }

    .cat{
      border:solid thin #ddd;
      height: 18em;
      -webkit-transition: opacity 0.4s, border 0.4s; /* Safari */
      transition: opacity 0.4s, border 0.4s;
    }
    .cat a{
      border:none;
    }

    .cat:hover{
      opacity: 0.5;
      border: solid thin #333;
    }
</style>
@endsection
