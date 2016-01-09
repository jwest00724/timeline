<!doctype html>
<html>

	<head>
	
		<link rel='stylesheet' type='text/css' href='{!! asset("css/master.css") !!}'>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		
	</head>
	
	<body>
	
		<h1 id='title'>
			<a href='{{ url("/") }}'>Star Trek Timeline</a>
		</h1>
		
		@yield('content')
		
	</body>
	
</html>