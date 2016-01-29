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
                {!! csrf_field() !!}
                <div>
                    <label for='title'>Title</label>
                    <input type='text' name='title'>
                </div>
                <div>
                    <label for='title'>Description</label>
                    <textarea name='description'></textarea>
                </div>
                <div>
                    <label for='title'>Category</label>
                    <input type='text' name='category'>
                </div>
                <div>
                    <label for='title'>Url</label>
                    <input type='text' name='url'>
                </div>
                <br/>
                <input type='submit' name='submit' value='Upload Video Tutorial' class='fa fa-upload'>
            </form>
        </div>
    </div>
</div>