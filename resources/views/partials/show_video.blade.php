<div class='video-wrapper'>
  <iframe width=100% height=600
    src="http://www.youtube.com/embed/{{$video->youtubeID()}}?rel=0">
  </iframe>
  <div class='video-info'>
    <h4 class='text-right'> <span><strong>Uploaded {{$video->created_at->diffForHumans()}}</strong> by <a href='/{{$video->owner->username}}' style="color:#e89980;">{{ $video->owner->name }}</a> </span></h4>
    <p>
      {{$video->description}}<br/>
      <span class='fa' style='color:#e89980; margin-left:3px;'>
          @can('user-is-signed-in')
            @if($video->likes()->get()->contains('user_id', Auth::user()->id))
              <a href='/video/{{$video->id}}/like' style="border-bottom:none;" id='like' class='fa fa-heart' name='like'></a>
            @else
              <a href='/video/{{$video->id}}/like' style="border-bottom:none;" id='like' class='fa fa-heart-o' name='like'></a>
            @endif
          @endcan
          <span id='like-count'>{{ count($video->likes) }}</span> likes
        </span>
    </p>
  </div>
</div>
<div class='lesson-discuss' style="margin-bottom:2em;">
  <h3 class='text-left'> COMMENTS </h3>
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
    <div class='col-xs-12 col-md-12'>
      <h4 id='comment-anchor'>Add Comment as</h4>
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
            <input type='text' name='author' style="max-width:100%;"/>
          </div>

          <div class='form-action'>
            <label for='body'>Comment</label>
            <textarea name='body' style="max-width:100%;"></textarea>
          </div>
          <div class='form-action' style="margin-top:0.4em;">
            <button type='submit' class='btn btn-block mybutton'>Post Comment</button>
          </div>
        @else
          <div class='row'>
            <div class="col-xs-5 col-sm-4 col-md-2 col-lg-2" style="height:8em;">
              <img src='{{ Auth::user()->avatar }}' class='img-thumbnail pull-left' style="width:100%;"/>
            </div>
            <div class="col-xs-7 col-sm-8 col-md-10 col-lg-10" style="height:8em;">
              <div class='form-action' style="height:100%">
                <textarea name='body' style='max-width:100%; height:100%;'></textarea>
              </div>
            </div>
          </div>
          <div class='form-action text-right' style="margin-top:0.4em;">
            <button type='submit' class='btn mybutton'>Post Comment</button>
          </div>
        @endif
      </form>
    </div>
  </div>
</div>
