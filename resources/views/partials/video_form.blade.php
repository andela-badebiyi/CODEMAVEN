{!! csrf_field() !!}
<div>
    <label for='title'>Title</label>
    <input type='text' name='title' value="{{ old('title') }}">
</div>
<div>
    <label for='description'>Description</label>
    <textarea name='description'>{{ old('description') }}</textarea>
</div>
<div>
    <label for='category'>Category</label>
    <input type='text' name='category' value="{{ old('category') }}">
</div>
<div>
    <label for='url'>Url</label>
    <input type='text' name='url' value="{{ old('url') }}">
</div>
<br/>
<button type='submit' name='submit' class='btn fa fa-upload mybutton'>
    Upload Video Tutorial
</button>