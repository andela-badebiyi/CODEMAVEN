<form method="POST" action="/register">
		<h2 class='align-center' style='border-bottom: solid 2px #e5e5e5; background-color:#000; color: #e89980'>
			Sign Up
		</h2>
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
			        <span class='visible-xs-block'>Name</span>
			        <input type="text" name="name" value="" placeholder='Enter your full name'>
			    </div>

		    <div class="field">
		        <span class='visible-xs-block'>Email</span>
		        <input type="email" name="email" value="" placeholder='Enter your email'>
		    </div>

		    <div class="field">
		        <span class='visible-xs-block'>Password</span>
		        <input type="password" name="password" placeholder='Enter your password'>
		    </div>

		    <div class="field">
		        <span class='visible-xs-block'>Confirm Password</span>
		        <input type="password" name="password_confirmation" placeholder='Confirm your password'>
		    </div>

		    <div class="field" style="margin-top:1em;">
		        <input type="submit" name='submit' value="Register">
		    </div>
		</form>
