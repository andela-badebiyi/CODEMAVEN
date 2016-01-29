@if (Session::has('message'))
  <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class='fa fa-check'></i> {{ Session::get('message') }}
  </div>
@endif

@if(count($errors->all()))
  <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      @foreach($errors->all() as $error)
        <div><i class='fa fa-times'></i> {{ $error }} </div>
      @endforeach
  </div>
@endif