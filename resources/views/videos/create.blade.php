@extends('layouts.master')
@section('title', 'Upload')

<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
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
