@extends('master')

@section('content')
	
	<script>
		$(document).ready(function() {
			
			/* Currently applied filters */
			//var selectedTags = [];
			//var selectedCollections = [];
			//var selectedMediums = [];
			
			/* Add or remove tag filter */
			$('.tagButton').click(function() {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				} else {
					$(this).addClass('selected');
				}
			});
			
			/* Add or remove collection filter */
			
			/* Add or remove medium filter */
			
			/* Show or hide collections accordion style */
			$('.expandCollapseButton').click(function () {
				$classes = $(this).attr('class');
				$classes = $classes.split(" ");
				$series = $classes[$classes.length - 1];
				$buttonMessage = $(this).html();
				
				if ($buttonMessage == 'Hide Collections') {
					$('.collectionHolder.' + $series).slideUp();
					$(this).html('Show Collections');
				} else {
					$('.collectionHolder.' + $series).slideDown();
					$(this).html('Hide Collections');
				}
			});
		});
	</script>
	
	<!-- Buttons to filter events -->
	<div id='leftButtons'>
		<p class='label'>Tags</p>
		@foreach($tags as $tag)
			<button class='filterButton tagButton'>{{ $tag }}</button><br>
		@endforeach
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		<p class='label'>Series</p>
		@foreach(array_keys($seriesToCollections) as $series)
			<button class='filterButton'>{{ $series }}</button><br>
			<button class='expandCollapseButton {{ $series }}'>Show Collections</button><br>
			<div class='collectionHolder {{ $series }}'>
			@foreach($seriesToCollections[$series] as $collection)
				<button class='compactFilterButton'>{{ $collection }}</button><br>
			@endforeach
			</div>
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