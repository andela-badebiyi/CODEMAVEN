@extends('layouts.master')
@section('title', 'My Videos')

<div class="row con" style="margin-top:4em;">
		<div class="col-md-3">
			@include('partials.dashboard_nav')
		</div>

    <div class="col-md-8">
      @include('partials.dashboard_flash')
      <h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
        {{$video->title}}
      </h2>
      <p><a href='/videos' class='button fa fa-arrow-left'>  Back to Videos</a></p>
      <div class='video-wrapper'>
        <iframe width=100% height=600
          src="http://www.youtube.com/embed/{{$video->youtubeID()}}?rel=0">
        </iframe>
        <div class='video-info'>
          <h4> <strong>Uploaded {{$video->created_at->diffForHumans()}}</strong> </h4>
          <p>
            {{$video->description}}<br/>
						<span class='fa fa-heart' style='color:#e89980;'>
								{{ count($video->likes) }} likes <br/>
								@if(App\Video::userHasAlreadyLikedVideo(Auth::user()->id, $video->id))
									<a href='/video/{{$video->id}}/like'><span class='fa fa-thumbs-down'> Unlike</span></a>
								@else
									<a href='/video/{{$video->id}}/like'><span class='fa fa-thumbs-up'> Like</span></a>
								@endif
						</span><br/>
            <span class='fa fa-user'> </span> Uploaded By: <a href='#'>{{ $video->owner->name }}</a>
          </p>
        </div>
      </div>
      <div class='lesson-discuss'>
        <h3 class='text-center'> COMMENTS </h3>
				@if (count($comments) == 0)
					<p style='color:#ff0000;'>No Comments</p>
				@else
					<div class='row'>
						@foreach($comments as $comment)
							<div class='col-md-12'>
							@include('partials.show_comments', [
								'cmt' => $comment,
								'reply' => 'no'
							])
						</div>
						@endforeach
					</div>
				@endif
				<div class='add-comments row'>
					<div class='col-md-6'>
						<h4>Add Comments</h4>
						@if (Session::has('message-comment'))
						  <div class="alert alert-success">
						      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						      <i class='fa fa-check'></i> {{ Session::get('message-comment') }}
						  </div>
						@endif
						<form action='/video/{{$video->id}}/comment' method='post'>
							{!! csrf_field() !!}
							<div class='form-action'>
								<label for='author'>Name</label>
								<input type='text' name='author' />
							</div>
							<div class='form-action'>
								<label for='body'>Comment</label>
								<textarea name='body'>
								</textarea>
							</div>
							<div class='form-action' style="margin-top:0.4em;">
								<input type='submit' value='Post Comment' class='btn btn-primary btn-block'>
							</div>
						</form>
					</div>
				</div>
      </div>
    </div>
</div>

<style>
  .video-wrapper{
    border: solid thick #5bc0de;
  }
  .lesson-discuss{
    margin-top: 3em;
    background-color:white;
    padding: 1em 1em 1em 1em;
  }
  .lesson-discuss h3{
    text-align:center;
    border-bottom: solid thin #ccc;
  }
  .video-info{
    background-color: #fff;
    min-height: 3em;
    padding:2em 1em 1em 1em;
  }
	div.reply-form{
		display:none;
	}

	div.comment-section a{
		border-bottom:none;
	}
</style>
@section('js')
<script>
$(document).ready(function(){
	$('.reply-link').click(function(){
		$(this).next().toggle();
		return false;
	});
});
</script>
@endsection
