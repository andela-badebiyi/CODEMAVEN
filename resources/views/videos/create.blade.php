@extends('layouts.dashboard')
@section('title', 'Upload')

@section('details')	
    <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        <span class='fa fa-upload'></span> Upload a Video Tutorial
    </h2>
    @include('partials.dashboard_flash')
    <div>
        <form action='{{ route("videos.store") }}' method='post'>
            @include('partials.video_form')
            
        </form>
    </div>
@endsection

@section('css')
    @parent
    <link rel='stylesheet' href='{!! asset("css/resolve.css") !!}' />
@endsection