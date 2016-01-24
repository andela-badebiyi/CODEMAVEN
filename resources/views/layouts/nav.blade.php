<!-- Header -->
<header id="header" class="alt" style="background-color:#000;">
	<h1><a href="/">CodeMaven</a> by Bodunde</h1>
	<nav id="nav">
		<ul>
			<li><a href="/">Home</a></li>
			@if(Auth::check())
				{!! 'Hello, '. Auth::user()->name !!}
				<a href='/logout'>Logout</a>
			@else
				{{ Auth::user() }}
				<li><a href="/login">Sign In</a></li>
				<li><a href="/register" class="button">Sign Up</a></li>
			@endif
		</ul>
	</nav>
</header>