@extends('layouts.master')
@section('title', 'My Videos')
@section('content')
<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
    	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    		My Videos
    	</h2>
        @include('partials.dashboard_flash')
    	<p style="text-align:center;"><a href='/videos/create' class='btn btn-primary fa fa-upload'> Upload New Video</a></p>
    	@if(count($videos) == 0)
    		<p class='fa fa-frown-o' style='color:red;'> You have no videos</p>
    	@else
            @include('partials.video_list')
    	@endif
    </div>
</div>
@endsection