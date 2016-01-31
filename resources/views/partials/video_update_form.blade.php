{!! csrf_field() !!}
<div>
    <label for='title'>Title</label>
    <input type='text' name='title' value="{{ old('title') }}" placeholder="{{ $video->title }}">
</div>
<div>
    <label for='description'>Description</label>
    <textarea name='description' placeholder="{{ $video->description }}"> {{ old('description') }}</textarea>
</div>
<div>
    <label for='category'>Category</label>
    <input type='text' name='category' value="{{ old('category') }}" placeholder="{{ $video->category }}">
</div>
<div>
    <label for='url'>Url</label>
    <input type='text' name='url' value="{{ old('url') }}" placeholder="{{ $video->url }}">
</div>
<br/>
