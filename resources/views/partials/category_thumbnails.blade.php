<div class='col-md-3 cat' style="padding:1em 1em 1em 1em;">
  <a href='/category/{!! $category->name !!}'>
  <div class='text-center'>
    @if($category->avatar == null)
      <img src='https://cdn0.iconfinder.com/data/icons/communication-technology/500/code_brackets-512.png' />
    @else
      <img src='{{ $category->avatar }}' />
    @endif
  </div>
  <strong style="color:#e89980;">{{strtoupper($category->name)}}</strong>
  <span class='pull-right' style='color:#333;'><i class='fa fa-folder'></i> {{count($category->videos()->get())}} videos</span>
  </a>
</div>
