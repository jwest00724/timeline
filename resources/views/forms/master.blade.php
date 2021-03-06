@extends('master')

@section('content')
	
	<link rel='stylesheet' type='text/css' href='{!! asset("css/forms.css") !!}'>
	
	<!-- Button Events -->
		<script>
			$(document).ready(function() {
				$('#resetButton').click(function() {
					location.reload();
				});
				$('#cancelButton').click(function() {
					window.history.back();
				});
			});
		</script>
	
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
	
	<!-- Form Content -->
		<div class='formHolder'>
			@yield('formContent')
		</div>
	
	<!-- Save/Reset/Cancel Buttons -->
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
	
	<!-- Warning Message -->
		<div id='warningMessage'>
			Note: This entry will not be visible in the timeline unless it is given a relationship in the relationship editor.
		</div>
@endsection