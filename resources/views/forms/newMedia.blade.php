@extends('forms/master')

@section('formContent')

	<!-- New event form -->
	<form role="form" method="POST" action="{{ url('/newMedia') }}">
		{!! csrf_field() !!}
		<div class='label'>Name</div>
		<input name="name" class='input' type="text">
		<div class='label'>Credit (Author/Director/Developer)</div>
		<input name="credit" class='input' type="text">
		<div class='label'>Series</div>
		<input name="series" class='input' type="text">
		<div class='label'>Collection</div>
		<input name="collection" class='input' type="text">
		<div class='label'>Number in Collection</div>
		<input name="numberInCollection" class='input' type="text">
		<div class='label'>Medium</div>
		<input name="medium" class='input' type="text">
		<div class='label'>Summary</div>
		<textarea name="summary" class='input text-area'></textarea>
		<div class='label'>Date in Timeline</div>
		<input name="timelineDate" class='input' type='date'>
		<div class='buttonHolder'>
			<button type='submit' class='formButton'>Save</button>
			<button type='reset' class='formButton'>Reset</button>
			<button class='formButton'>Cancel</button>
		</div>
	</form>
	
@endsection