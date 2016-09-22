@extends('layouts.master')
@section('title', 'Edit Video')

@section('content')
<div class="row con" style="margin-top:4em;">
		@include('partials.dashboard_nav')

    <div class=" col-xs-12 col-md-8 col-sm-12 col-lg-8" style="padding:0 3em 0 3em;">
    	@include('partials.dashboard_flash')
        <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
            EDIT VIDEO :: {{ $video->title }}
        </h2>
        <div>
            {!! Form::open(['route' => ['videos.update', $video->slug], 'method' => 'put']) !!}
                @include('partials.video_update_form')
                <a href="{{ route('videos.index') }}" class='button fa fa-arrow-left'> Go Back to videos</a>
                <input type='submit' name='submit' value='Update Video Tutorial' class='fa fa-upload'>
            </form>
        </div>
    </div>
</div>
@endsection