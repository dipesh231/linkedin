<!DOCTYPE HTML>
<html>
	<head>
		<title>PHPJabbers.com | Free Job Agency Website Template</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{asset('frontend/assets/bootstrap/css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}" />
		<noscript><link rel="stylesheet" href="{{asset('frontend/assets/css/noscript.css')}}" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper">
				@include('frontend.navbar')

                @yield('content')

                @include('frontend.footer')

			</div>

		<!-- Scripts -->
			<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
			<script src="{{asset('frontend/assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
			<script src="{{asset('frontend/assets/js/jquery.scrolly.min.js')}}"></script>
			<script src="{{asset('frontend/assets/js/jquery.scrollex.min.js')}}"></script>
			<script src="{{asset('frontend/assets/js/main.js')}}"></script>

	</body>
</html>