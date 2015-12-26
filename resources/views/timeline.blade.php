@extends('master')

@section('content')
	
	<!-- Buttons to filter events -->
	<div id='leftButtons'>
		<p class='label'>Tags</p>
		@foreach($tags as $tag)
			<button class='filterButton'>{{ $tag }}</button><br>
		@endforeach
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		<p class='label'>Series</p>
		@foreach(array_keys($seriesToCollections) as $series)
			<button class='filterButton'>{{ $series }}</button><br>
			@foreach($seriesToCollections[$series] as $collection)
				{{ $collection }}<br>
			@endforeach
		@endforeach
		<p class='label'>Mediums</p>
		@foreach($mediums as $medium)
			<button class='filterButton'>{{ $medium }}</button><br>
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