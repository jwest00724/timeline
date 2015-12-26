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
		@foreach($dates as $date)
			<tr>
				<td id='eventCell'>
					@foreach($events[$date] as $eventForThisDate)
						{{ $eventForThisDate['name'] }}<br>
					@endforeach
				</td>
				<td id='dateCell'>
					{{ $date }}
				</td>
				<td id='mediaCell'>
					@foreach($media[$date] as $mediaForThisDate)
						{{ $mediaForThisDate['name'] }}<br>
					@endforeach
				</td>
			</tr>
		@endforeach
	</table>
	
@endsection