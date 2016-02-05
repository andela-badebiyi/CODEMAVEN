<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>CodeMaven:: @yield('title') </title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}" />
		<link rel="stylesheet" href="{!! asset('css/main.css') !!}" />
		@yield('css')
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body class="landing">
		<div id="page-wrapper">
		@include('layouts.nav')
		@yield('content')
		</div>

					<!-- Footer -->
		<footer id="footer">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
			</ul>
			<ul class="copyright">
				<li>&copy; Untitled. All rights reserved.</li><li>Design: Adebiyi Bodunde</li>
			</ul>
		</footer>

		<!-- Scripts -->
		<script src="{!! asset('js/jquery.min.js') !!}"></script>
		<script src="{!! asset('js/jquery.dropotron.min.js') !!}"></script>
		<script src="{!! asset('js/jquery.scrollgress.min.js') !!}"></script>
		<script src="{!! asset('js/skel.min.js') !!}"></script>
		<script src="{!! asset('js/util.js') !!}"></script>
		<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="{!! asset('js/main.js') !!}"></script>
		@yield('js')
	</body>
</html>
