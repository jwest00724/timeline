@extends('forms/master')

@section('formContent')
	
	<!-- Form validation errors -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	<!-- New event form -->
	<form role="form" method="POST" action="{{ url('/newEvent') }}">
		{!! csrf_field() !!}
		<div class='label'>Name</div>
		<input name="name" class='input' type="text">
		<div class='label'>Summary</div>
		<textarea name="summary" class='input text-area'></textarea>
		<div class='label'>Date in Timeline</div>
		<input name="timelineDate" class='input' type='date'>
		<button type='submit' class='formButton'>Save</button>
	</form>
	
@endsection