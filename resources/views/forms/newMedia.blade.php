@extends('forms/master')

@section('formContent')

	<!-- New event form -->
	<form role="form" method="POST" action="{{ url('/newMedia') }}">
		{!! csrf_field() !!}
		
		<!-- Name -->
		<div class='label'>Name</div>
		<input name="name" class='input' type="text">
		
		<!-- Credit -->
		<div class='label'>Credit (Author/Director/Developer)</div>
		<input name="credit" class='input' type="text">
		
		<!-- Series -->
		<div class='label'>Series</div>
		<select class='input'>
			@foreach($series as $aSeries)
				<option name='series' value='{{ $aSeries }}'>{{ $seriesAbbrToName[$aSeries] }}</option>
			@endforeach
			<option value='newSeries'>New Series</option>
		</select>
		
		<!-- Collection -->
		<div class='label'>Collection</div>
		<select class='input'>
			<option>list of collections</option>
		</select>
		
		<!-- Number in Collection -->
		<div class='label'>Number in Collection</div>
		<input name="numberInCollection" class='input' type="number">
		
		<!-- Medium -->
		<div class='label'>Medium</div>
		<select class='input'>
			<option>list of mediums</option>
		</select>
		
		<!-- Summary -->
		<div class='label'>Summary</div>
		<textarea name="summary" class='input text-area'></textarea>
		
		<!-- Timeline Date -->
		<div class='label'>Date in Timeline</div>
		<input name="timelineDate" class='input' type='date'>
		
		<!-- Save/Reset/Cancel Buttons -->
		<div class='buttonHolder'>
			<button type='submit' class='formButton'>Save</button>
			<button type='reset' class='formButton'>Reset</button>
			<button class='formButton'>Cancel</button>
		</div>
	</form>
	
@endsection