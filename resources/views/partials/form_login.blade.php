<form method="POST" action="/login">
<h2 class='align-center' style='color: #e89980; background-color: #000; border-bottom: solid 2px #e5e5e5;'>Sign In</h2>
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
        <span class='visible-xs-block'>Email</span>
        <input type="email" name="email" value="" placeholder='Enter your email'>
    </div>

    <div class="field">
        <span class='visible-xs-block'>Password</span>
        <input type="password" name="password" placeholder='Enter your password'>
    </div>

   	<div class="field">
		<input type="checkbox" name="remember"> Remember Me
	</div>

    <div class="field" style="margin-top:1em;">
        <input type="submit" name='login' value="Login"><br/>
        <a href='/password/reset' style="background-color:#fff;">Forgot password</a>
    </div>
</form>
