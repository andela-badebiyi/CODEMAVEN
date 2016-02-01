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
          @can('user-is-signed-in')
            @if(App\Video::userHasAlreadyLikedVideo(Auth::user()->id, $video->id))
              <a href='/video/{{$video->id}}/like'><span class='fa fa-thumbs-down'> Unlike</span></a>
            @else
              <a href='/video/{{$video->id}}/like'><span class='fa fa-thumbs-up'> Like</span></a>
            @endif
          @endcan
      </span><br/>
      <span class='fa fa-user'> </span> Uploaded By: <a href='/{{$video->owner->username}}'>{{ $video->owner->name }}</a>
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
