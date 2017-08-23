<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Quality Assurance Systems') }}</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://www.cscpro.org/image/E63h.png">

		<!-- Styles -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/sandstone/bootstrap.min.css" rel="stylesheet">
		<link href="{{ url( 'css/borang.css' ) }}" rel="stylesheet">
<!-- 		<link href="{{ url( 'css/bv3-bv4.min.css' ) }}" rel="stylesheet"> -->

		<!-- Scripts -->
		<script>
			window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]) !!};
		</script>

		@yield( 'style' )
	</head>

	<body>
		<div id="app">
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">

						<!-- Collapsed Hamburger -->
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!-- Branding Image -->
						<a class="navbar-brand" href="{{ url('/') }}">
							{{ 'Road to TA' }}
						</a>
					</div>

					<div class="collapse navbar-collapse" id="app-navbar-collapse">
						<!-- Left Side Of Navbar -->
						@include( 'layouts.nav' )

						<!-- Right Side Of Navbar -->
						<ul class="nav navbar-nav navbar-right">
							<!-- Authentication Links -->
							@if (Auth::guest())
							<li><a href="{{ url('/login') }}">Login</a></li>
							<li><a href="{{ url('/register') }}">Register</a></li>
							@else
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									{{ Auth::user()->name }} <span class="caret"></span>
								</a>

								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/logout') }}"
										   onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
											Logout
										</a>

										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>

			<div id="content" class="container">
				@if ( Session::has( 'message' ) )
				<div class="alert alert-{{ Session::get('alert-class', 'alert-info') }}">
					{{ Session::get('message') }}
				</div>
				@endif

				@if ( count( $errors ) > 0 )
				<div class="alert alert-danger">
					<h4>Oops.. Something Error!</h4>
					<ul>
						@foreach ( $errors->all() as $error )
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				@yield( 'content' )
			</div>
		</div>

		<!-- Scripts -->
<!-- 		<script src="/js/app.js"></script> -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		@yield( 'script' )
	</body>
</html>
