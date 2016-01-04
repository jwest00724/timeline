@extends('master')

@section('content')
	
	<link rel='stylesheet' type='text/css' href='{!! asset("css/forms.css") !!}'>
	
	<!-- Form validation errors -->
	@if (count($errors) > 0)
		<div class='errorHolder'>
		<div class="errors">
			There were some problems with your input:
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div></div>
	@endif
	
	<div class='formHolder'>
		@yield('formContent')
	</div>
	
	<div class='buttonHolder'>
		<div class='formButton'>
			@yield('saveButton')
		</div>
		<div class='formButton'>
			@yield('resetButton')
		</div>
		<div class='formButton'>
			@yield('cancelButton')
		</div>
	</div>
@endsection