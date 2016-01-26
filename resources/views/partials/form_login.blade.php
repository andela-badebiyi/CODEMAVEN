<form method="POST" action="/login">
<h2 class='align-center' style='border-bottom: solid 2px #e5e5e5;'>Login</h2>
    {!! csrf_field() !!}
    <div class="field">
    	@if (count($errors) > 0)
	    	<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		@foreach($errors->all() as $error)
					<li> {{ $error }} </li>
				@endforeach
			</div>
		@endif
        Email
        <input type="email" name="email" value="">
    </div>

    <div class="field">
        Password
        <input type="password" name="password">
    </div>

   	<div class="field">
		<input type="checkbox" name="remember"> Remember Me
	</div>

    <div class="field" style="margin-top:1em;">
        <input type="submit" value="Login">
    </div>
</form>