@extends('forms/master')

@section('formContent')
	
	<!-- New event form -->
	<form role="form" method="POST" action="{{ url('/newEvent') }}">
		{!! csrf_field() !!}
		<div class='label required'>Name</div>
		<input name="name" class='input' type="text">
		<div class='label'>Summary</div>
		<textarea name="summary" class='input text-area'></textarea>
		<div class='label required'>Date in Timeline</div>
		<input name="timelineDate" class='input' type='date'>
		<div class='buttonHolder'>
			<button type='submit' class='formButton'>Save</button>
			<button type='reset' class='formButton'>Reset</button>
			<button class='formButton'>Cancel</button>
		</div>
	</form>
	
@endsection