<form method="POST" action="/register">
		<h2 class='align-center' style='border-bottom: solid 2px #e5e5e5;'>REGISTER FOR AN ACCOUNT</h2>
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
			        Name
			        <input type="text" name="name" value="">
			    </div>

		    <div class="field">
		        Email
		        <input type="email" name="email" value="">
		    </div>

		    <div class="field">
		        Password
		        <input type="password" name="password">
		    </div>

		    <div class="field">
		        Confirm Password
		        <input type="password" name="password_confirmation">
		    </div>

		    <div class="field" style="margin-top:1em;">
		        <input type="submit" value="Register">
		    </div>
		</form>