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
    {{ Form::select('category_id', $categories) }}
    <span id='cat-span' style="color:#e89980;"><a href='#' id='add-category' data-token='{{ csrf_token() }}' style='border:none;' class='fa fa-plus'> Add new category</a></span>
</div>
<div>
    <label for='url'>Url</label>
    <input type='text' name='url' value="{{ old('url') }}">
</div>
<br/>
<button type='submit' name='submit' class='btn fa fa-upload mybutton'>
    Upload Video Tutorial
</button>
@section('js')
@parent
<script src='{{ asset("js/jquery.js") }}'></script>
<script src='{{ asset("js/jalert.js") }}'></script>
<script>
  $(document).ready(function(){
    $('#add-category').click(function(){
      var token = $('#add-category').attr('data-token');
      jPrompt('Enter A new Category:', '', 'Create New Category', function(category) {
          if(category){
            $('#cat-span').html("<i class='fa fa-spinner fa-spin'></i> creating category");
            createNewCategory(category, token);
          }
      });
    });

    function createNewCategory(name, token){
      $.post(
        '/category/create',
        {name: name, _token: token},
        function(data){
          if(data == 'failed'){
            $('#cat-span').html("<i class='fa fa-times'></i> failed");
          } else {
            $('#cat-span').html("<i class='fa fa-check'></i> new category created");
            updateDropDown(data, name);
          }
        }
      );
    }

    function updateDropDown(data, name){
      html = $('select').html();
      html += "<option value='" + data +"'>"+name+"</option>";
      $('select').html(html);
    }
  });
</script>
@endsection
@section('css')
@parent
<link rel='stylesheet' href='{{ asset("css/jalert.css") }}' />
@endsection
