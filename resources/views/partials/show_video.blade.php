<div class='video-wrapper'>
  <iframe width=100% height=600
    src="http://www.youtube.com/embed/{{$video->youtubeID()}}?rel=0">
  </iframe>
  <div class='video-info'>
    <h4> <strong>Uploaded {{$video->created_at->diffForHumans()}}</strong> </h4>
    <p>
      {{$video->description}}<br/>
      <span class='fa fa-heart' style='color:#e89980; margin-left:3px;'>
          <span id='like-count'>{{ count($video->likes) }}</span>
          @can('user-is-signed-in')
            @if($video->likes()->get()->contains('user_id', Auth::user()->id))
              <a href='/video/{{$video->id}}/like' style="border-bottom:none;" id='like' class='fa fa-thumbs-down' name='like'></a>
            @else
              <a href='/video/{{$video->id}}/like' style="border-bottom:none;" id='like' class='fa fa-thumbs-up' name='like'></a>
            @endif
          @endcan
      </span><br/>
      <span class='fa fa-user'> </span> Uploaded By: <a href='/{{$video->owner->username}}'>{{ $video->owner->name }}</a>
    </p>
  </div>
</div>
<div class='lesson-discuss' style="margin-bottom:2em;">
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
    <div class='col-xs-12 col-md-8'>
      <h4>Add Comments</h4>
      @include('partials.dashboard_flash')
      @if (Session::has('message-comment'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class='fa fa-check'></i> {{ Session::get('message-comment') }}
        </div>
      @endif
      <form action='/video/{{$video->id}}/comment' method='post'>
        {!! csrf_field() !!}
        @if(!Auth::check())
          <div class='form-action'>
            <label for='author'>Name</label>
            <input type='text' name='author' />
          </div>
        @endif
        <div class='form-action'>
          <label for='body'>Comment</label>
          <textarea name='body'></textarea>
        </div>
        <div class='form-action' style="margin-top:0.4em;">
          <button type='submit' class='btn btn-block mybutton'>Post Comment</button>
        </div>
      </form>
    </div>
  </div>
</div>
