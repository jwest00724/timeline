@extends('master')

@section('content')
	
	<script>
	
		/* Filtered data (initialize to all data) */
		var filteredDates = <?php echo json_encode($dates) ?>;
		var filteredEvents = <?php echo json_encode($events) ?>;
		var filteredMedia = <?php echo json_encode($media) ?>;
	
		$(document).ready(function() {
			
			/* Add or remove button highlighting */
			$('.filterButton, .compactFilterButton').click(function() {
				$(this).toggleClass('selected');
				$series = $(this).attr('data-series');
				if ($(this).attr('data-filterType') == 'series') {
					if ($(this).hasClass('selected')) {
						$('.compactFilterButton[data-series="' + $series + '"]').addClass('selected');
					} else {
						$('.compactFilterButton[data-series="' + $series + '"]').removeClass('selected');
					}
				}
				if ($(this).attr('data-filterType') == 'collection') {
					var anyCollectionHighlighted = false;
					$('.compactFilterButton[data-series="' + $series + '"]').each(function() {
						if ($(this).hasClass('selected')) {
							anyCollectionHighlighted = true;
							return;
						}
					});
					if (!anyCollectionHighlighted)
						$('.filterButton[data-series="' + $series + '"]').removeClass('selected');
					else
						$('.filterButton[data-series="' + $series + '"]').addClass('selected');
				}
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
			<button class='filterButton' data-filterType='series' data-series='{{$series}}'>{{ $series }}</button><br>
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
		<script>
			for (var dateIndex=0; dateIndex<filteredDates.length; dateIndex++) {
				document.write('<tr><td id="eventCell">');
				for (var eventIndex = 0; eventIndex < filteredEvents[filteredDates[dateIndex]].length; eventIndex++) {
					document.write(filteredEvents[filteredDates[dateIndex]][eventIndex]['name'] + '<br>');
				}
				document.write('</td><td id="dateCell">' + filteredDates[dateIndex] + '</td>');
				document.write('<td id="mediaCell">');
				
				for (var mediaIndex = 0; mediaIndex < filteredMedia[filteredDates[dateIndex]].length; mediaIndex++) {
					document.write(filteredMedia[filteredDates[dateIndex]][mediaIndex]['name'] + '<br>');
				}
				
				document.write('</td></tr>');
			}
		</script>
	</table>
	
@endsection