@extends('master')

@section('content')
	
	<!-- Buttons to filter events -->
	<div id='leftButtons'>
		Tags<br>
		@foreach($tags as $tag)
			{{ $tag }}<br>
		@endforeach
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		Series<br>
		@foreach(array_keys($seriesToCollections) as $series)
			{{ $series }}<br>
			@foreach($seriesToCollections[$series] as $collection)
				{{ $collection }}<br>
			@endforeach
		@endforeach
		Mediums<br>
		@foreach($mediums as $medium)
			{{ $medium }}<br>
		@endforeach
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