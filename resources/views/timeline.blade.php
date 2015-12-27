@extends('master')

@section('content')
	
	<script>
		$(document).ready(function() {
			
			/* Add or remove filters */
			$('.filterButton, .compactFilterButton').click(function() {
				$(this).toggleClass('selected');
			});
			
			/* Show or hide collections accordion style */
			$('.expandCollapseButton').click(function () {
				$series = $(this).attr('data-series');
				if ($(this).html() == 'Hide Collections') {
					$('.collectionHolder[data-series="' + $series + '"]').slideUp();
					$(this).html('Show Collections');
				} else {
					$('.collectionHolder[data-series="' + $series + '"]').slideDown();
					$(this).html('Hide Collections');
				}
			});
		});
	</script>
	
	<!-- Buttons to filter events -->
	<div id='leftButtons'>
		<p class='label'>Tags</p>
		@foreach($tags as $tag)
			<button class='filterButton' data-filterType='tag'>{{ $tag }}</button><br>
		@endforeach
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		<p class='label'>Series</p>
		@foreach(array_keys($seriesToCollections) as $series)
			<button class='filterButton' data-filterType='series'>{{ $series }}</button><br>
			<button class='expandCollapseButton' data-series='{{$series}}'>Show Collections</button><br>
			<div class='collectionHolder' data-series='{{$series}}'>
			@foreach($seriesToCollections[$series] as $collection)
				<button class='compactFilterButton' data-filterType='collection' data-series='{{$series}}'>{{ $collection }}</button><br>
			@endforeach
			</div>
		@endforeach
		<p class='label'>Mediums</p>
		@foreach($mediums as $medium)
			<button class='filterButton' data-filterType='medium'>{{ $medium }}</button><br>
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