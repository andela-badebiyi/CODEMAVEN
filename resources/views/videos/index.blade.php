@extends('layouts.master')
@section('title', 'My Videos')
@section('content')
<div class="row con" style="margin-top:4em;">
	@include('partials.dashboard_nav')

    <div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
    	<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
    		My Videos
    	</h2>
        @include('partials.dashboard_flash')
    	<p style="text-align:center;"><a href='/videos/create' class='btn btn-primary fa fa-upload'> Upload New Video</a></p>
			<br />
    	@if(count($videos) == 0)
    		<p class='fa fa-frown-o' style='color:red;'> You have no videos</p>
    	@else
            @include('partials.video_list')
    	@endif
    </div>
</div>
@endsection
