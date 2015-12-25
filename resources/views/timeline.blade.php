@extends('master')

@section('content')
	
	<!-- Buttons to filter events -->
	<div id='leftButtons'>
		Event Buttons
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		Media Buttons
	</div>
	
	<!-- Timeline display of events and media -->
	<table id='timeline'>
		<tr>
			<td id='events'>
				Events
			</td>
			<td id='dates'>
				Dates
			</td>
			<td id='media'>
				Media
			</td>
		</tr>
	</table>
	
@endsection