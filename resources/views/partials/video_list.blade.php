<div class='row'>
@foreach($videos as $video)
<div class="col-md-4" style="padding: 0 1em 0 1em !important;">
  <div class="content-grid">
      <img src="http://img.youtube.com/vi/{!!$video->youtubeID()!!}/hqdefault.jpg"/>
      <h3>
        @if(strlen($video->title) > 30)
          {{ substr($video->title, 0, 30) }}...
        @else
          {{ $video->title }}
        @endif
      </h3>
      <p>
        @if(strlen($video->description) > 50)
          {{ substr($video->description, 0, 50) }}...
        @else
          {{ $video->description }}
        @endif
        <div class='text-align'>
          <span class='fa fa-eye' style="border:solid medium #e89980;
          padding:0.2em 0.2em 0.2em 0.2em; background-color:#e89980;
          border-radius: 4px 4px 4px 4px; color: #fff;">
            {{$video->view_count}} views
          </span>
        </div>
      </p>
      @can('user-owns-video', $video)
        <a class="button-vid" href="{!! route('videos.edit', ['slug' => $video->slug]) !!}"
          style='background-color:#5bc0de'>
          <i class='fa fa-pencil-square-o'></i>  <span>Edit Video</span>
        </a>
        {{ Form::open(['method' => 'DELETE', 'style' => 'margin-bottom:0;', 'route' => ['videos.destroy', $video->slug]]) }}
          <button class='button-vid' type='submit' style='width:100%;background-color:#d9534f'>
            <i class="fa fa-trash-o"></i><span> Delete Video</span>
          </button>
        {{ Form::close() }}
      @endcan
      <a class="button-vid" href="{!! route('videos.show', ['slug' => $video->slug]) !!}">
        <i class='fa fa-play'></i>  <span>Watch now</span>
      </a>
  </div>
</div>
@endforeach
</div>
<style>
  .content-grid{
    border: groove medium #ccc;
  }
</style>
