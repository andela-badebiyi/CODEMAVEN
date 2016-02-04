@extends('layouts.master')
@if (Auth::check())
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
	  	@include('partials.show_video')
    </div>
	</div>
@else
	@section('title', 'All Videos')
	<div class='view-videos'>
		@include('partials.dashboard_flash')
		<h2 style="border-bottom:solid thin #ccc; border-top:solid thin #ccc;">
			{{$video->title}}
		</h2>
		<p><a href='/allvideos' class='button fa fa-arrow-left'>  Back to all Videos</a></p>
		@include('partials.show_video')
	</div>
@endif
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
	.view-videos{
		width: 80%;
		margin-top: 3em;
		margin-left: auto;
		margin-right: auto;
		padding: 3em 3em 3em 3em;
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

$(document).ready(function(){
  $('#like').click(function(e){
    e.preventDefault();
    var likeLink = $(this);
    $.ajax({
      url: likeLink.attr('href'),
      success: function(result){
        if (result == 1) {
          likeLink.removeAttr('class', 'fa-thumbs-down');
          likeLink.attr('class', 'fa-thumbs-up');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) - 1)
        } 
        if (result == 2) {
          likeLink.removeAttr('class', 'fa-thumbs-up');
          likeLink.attr('class', 'fa-thumbs-down');

          likeCount = $('#like-count');
          likeCount.html(parseInt(likeCount.html()) + 1)
        }
      }
    });
  });
});
</script>
@endsection
