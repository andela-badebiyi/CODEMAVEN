<div class="field">
	<h2 class="align-center"> - OR - </h2>
		<div class="row" style="margin-top:0; margin-bottom:2em;">
		<div class="col-xs-12 col-sm-6 col-md-4 text-left">
			<a href="/login/facebook" class='btn btn-social btn-facebook'>
				<span class='fa fa-facebook'></span>
				Login With Facebook
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 text-center">
			<a href="/login/github" class="btn btn-social btn-github">
				<span class='fa fa-github'></span>
				Login With Github
			</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4 text-right">
			<a href="/login/twitter" class="btn btn-social btn-twitter">
				<span class='fa fa-twitter'></span>
				Login With Twitter
			</a>
		</div>
	</div>
</div>
@section('css')
	@parent
	<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}">
@endsection
