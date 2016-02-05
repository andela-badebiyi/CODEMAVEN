@extends('layouts.master')
@section('title', 'Upload')

<div class="row con" style="margin-top:4em;">
		
	@include('partials.dashboard_nav')

    <div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
    	@include('partials.dashboard_flash')
        <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
            Upload a Video Tutorial
        </h2>
        <div>
            <form action='{{ route("videos.store") }}' method='post'>
                @include('partials.video_form')
                
            </form>
        </div>
    </div>
</div>
