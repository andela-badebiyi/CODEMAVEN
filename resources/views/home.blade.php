@extends('layouts.master')
@section('title', 'Home')

<!-- Banner -->
@section('content')
	<section id="banner">
		<h2>&lt; CodeMaven /&gt;</h2>
		<p>Where Code Experts and Connoisseurs share their knowledge</p>
		<ul class="actions">
			@if(!Auth::check())
				<li><a href="/register" class="button special">Sign Up</a></li>
			@endif
			<li><a href="/allvideos" class="button">Browse tutorials...</a></li>
		</ul>
	</section>

	<!-- Main -->
	<section id="main" class="container">

		<section class="box special">
			<header class="major">
				<h2>
					Get access to learning resources for free
				</h2>
				<p>
					Browse our array of comprehensive tutorials on a variety of programming languages provided
					<br />by experts in their programming fields from around the world
				</p>
			</header>

		</section>

		<section class="box special">
			<header class="major">
				<h2>
					Contribute to this learning Hub
				</h2>
				<p>
					Contribute learning resources by signing up and uploading tutorial videos <br />
					or pdf tutorials.
				</p>
			</header>

		</section>

		<section class="box special features">
			<header class="major">
				<h2>
					Popular Categories
				</h2>
			</header>
			<div class="features-row">
				<section>
					<a href={{url('/category/php')}} class='no-link-style'>
						<img src='https://wisdmlabs.com/site/wp-content/uploads/2014/01/php-logo-Converted-01-3.png'
							width = auto height = 200 />
						<h3>PHP</h3>
						<p>
						PHP (recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language.
						</p>
					</a>
				</section>
				<section>
					<a href={{url('/category/nodejs')}} class='no-link-style'>
						<img src='https://lh6.googleusercontent.com/-sU5IRCCxMYc/TiZsuwV0nFI/AAAAAAAAALc/dH1OxZImcJU/nodejs2.png'
							width = auto height = 200 />
						<h3>NodeJs</h3>
						<p>
							As an asynchronous event driven framework, Node.js is designed to build scalable network applications.
						</p>
					</a>
				</section>
			</div>
			<div class="features-row">
				<section>
					<a href={{url('/category/java')}} class='no-link-style'>
						<img src='http://1.bp.blogspot.com/-b73FoohcHrM/VOycth1RcFI/AAAAAAAAVnI/nRvKNSlGERo/s1600/java-oracle.png'
						 	width = auto height = 200 />
						<h3>Java</h3>
						<p>
						Java is a high level, object-oriented, platform independent language.
						</p>
					</a>
				</section>
				<section>
					<a href={{url('/category/python')}} class='no-link-style'>
						<img src='http://www.morecambehigh.com/LIVE/wp-content/uploads/2014/12/Python-Logo.png'
							width=auto height=200>
						<h3>Python</h3>
						<p>
						Python is an interpreted, object-oriented, high-level programming language with dynamic semantics.
						</p>
					</a>
				</section>
			</div>
				<p class="text-center" style="margin-top: 1em;"><a href='/categories' class='btn mybutton'>Show All Categories</a></p>
		</section>

	</section>

	<!-- CTA -->
	<section id="cta">

		<h2>Subscribe to our Mailing list</h2>
		<form>
			<div class="row uniform 50%">
				<div class="8u 12u(mobilep)">
					<input type="email" name="email" id="email" placeholder="Email Address" />
				</div>
				<div class="4u 12u(mobilep)">
					<input type="submit" value="Subscribe" class="fit" />
				</div>
			</div>
		</form>

	</section>
	<style>
		.no-link-style{
			color: #333;
			text-decoration: none;
			border:none;
			-webkit-transition: opacity 0.6s;
    	transition: opacity 0.6s;
		}
		.no-link-style:hover{
			opacity: 0.3;
		}
		.no-link-style > img{
			max-width:300px;
		}
	</style>
@endsection
