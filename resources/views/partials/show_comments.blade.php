@if($reply == 'no')
  <div class='comment-section row' style="margin-bottom:2em">
    <div class='col-md-2'>
      <img src="{{asset('img/avatar.png')}}" />
    </div>
    <div class='col-md-10'>
      <strong style="color:#e89980">{{ $cmt->author }}</strong>
      <i style="font-size:60%; color:#ccc; line-height:1.5;">•</i>
      <small>{{ $cmt->created_at->diffForHumans() }}</small>
      <div>{{ $cmt->body }}</div>
      <a href='#' class='reply-link fa fa-reply'> reply</a>
      <div class='reply-form'>
      <form action='/video/{{$video->id}}/{{$cmt->id}}/reply' method='post' >
        {!! csrf_field() !!}
        @if(Auth::guest())
          <input name='author' type='text' placeholder='enter your name'>
        @endif
        <textarea name='body'></textarea>
        <input type='submit' name='submit' value='Reply'
        placeholder='enter your comment'/>
      </form>
      </div>
    </div>
  </div>
  @if (count($cmt->reply()->get()) > 0)
    @foreach($cmt->reply()->get() as $comment)
    <div class='col-md-offset-2'>
      @include('partials.show_comments', [
        'cmtreply' => $comment,
        'reply' => 'yes'
      ])
    </div>
    @endforeach
  @endif

@else
  <div class='comment-section row' style="margin-bottom:2em">
    <div class='col-md-2'>
      <img src="{{asset('img/avatar.png')}}" />
    </div>
    <div class='col-md-10'>
      <strong style="color:#e89980">{{ $cmtreply->author }}</strong>
      <i style="font-size:60%; color:#ccc; line-height:1.5;">•</i>
      <small>{{ $cmtreply->created_at->diffForHumans() }}</small>
      <div>{{ $cmtreply->body}}</div>
      <a href='#' class='reply-link fa fa-reply'> reply</a>
      <div class='reply-form'>
      <form action='/video/{{$video->id}}/{{$cmtreply->id}}/reply' method='post' >
        {!! csrf_field() !!}
        @if(Auth::guest())
          <input name='author' type='text' placeholder='enter your name'>
        @endif
        <textarea name='body'></textarea>
        <input type='submit' name='submit' value='Reply'
        placeholder='enter your comment'/>
      </form>
      </div>
    </div>
  </div>
  @if (count($cmtreply->reply()->get()) > 0)
    @foreach($cmtreply->reply()->get() as $comment)
    <div class='col-md-offset-2'>
      @include('partials.show_comments', [
        'cmtreply' => $comment,
        'reply' => 'yes'
      ])
    </div>
    @endforeach
  @endif

@endif
