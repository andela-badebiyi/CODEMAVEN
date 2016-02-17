@extends('layouts.dashboard')
@section('title', 'My Videos')

@section('css')
    @parent
    <link rel="stylesheet" href="{!! asset('css/show_video.css') !!}" />
@endsection


@section('details')
    <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    	<i class='fa fa-youtube-play'></i> My Videos
    </h2>
    @include('partials.dashboard_flash')
    <p style="text-align:center;"><a href='/videos/create' class='btn btn-primary fa fa-upload'> Upload New Video</a></p>
    	<br />
    @if(count($videos) == 0)
    	<p class='fa fa-frown-o' style='color:red;'> You have no videos</p>
    @else
        @include('partials.video_list')
    @endif
@endsection
