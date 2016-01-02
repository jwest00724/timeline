@extends('master')

@section('content')
	
	<link rel='stylesheet' type='text/css' href='{!! asset("css/timeline.css") !!}'>
	
	<script>
	
		/* Filtered data */
		var eventMediaPairs;
		var seriesToCollections;
		var eventIDToTags;
		var filteredDates; 
		var filteredEvents;
		var filteredMedia;
		
		/* Remove all filters from data */
		function resetData() {
			seriesToCollections = <?php echo json_encode($seriesToCollections) ?>;
			eventMediaPairs = <?php echo json_encode($eventMediaPairs) ?>;
			eventIDToTags = <?php echo json_encode($eventIDToTags) ?>;
			filteredDates = <?php echo json_encode($dates) ?>;
			filteredEvents = <?php echo json_encode($events) ?>;
			filteredMedia = <?php echo json_encode($media) ?>;
		}
	
		/* Apply filters to data */
		function applySelectedFilters() {
			var selectedCollections = document.querySelectorAll('.selected[data-filterType="collection"]');
			var selectedMediums = document.querySelectorAll('.selected[data-filterType="medium"]');
			var selectedSeries = document.querySelectorAll('.selected[data-filterType="series"]');
			var selectedTags = document.querySelectorAll('.selected[data-filterType="tag"]');
			var newEvents = new Array();
			var newMedia = new Array();
			resetData();
			
			/* Only add events with appropriate tags */
			for (var date = 0; date < Object.keys(filteredDates).length; date++) {
				newEvents[filteredDates[date]] = new Array();
				for (var event = 0; event < Object.keys(filteredEvents[filteredDates[date]]).length; event++) {
					for (var selectedTag = 0, match = false; selectedTag < Object.keys(selectedTags).length; selectedTag++) {
						for (var eventTag = 0; eventTag < Object.keys(eventIDToTags[filteredEvents[filteredDates[date]][event]['id']]).length; eventTag++) {
							if (selectedTags[selectedTag].innerHTML == eventIDToTags[filteredEvents[filteredDates[date]][event]['id']][eventTag]) {
								newEvents[filteredDates[date]].push(filteredEvents[filteredDates[date]][event]);
								match = true;
								break;
							}
						}
						if (match) break;
					}
				}
			}
			
			/* Only add media with appropriate medium and collection */
			for (var date = 0; date < Object.keys(filteredDates).length; date++) {
				newMedia[filteredDates[date]] = new Array();
				for (var media = 0; media < Object.keys(filteredMedia[filteredDates[date]]).length; media++) {
					for (var selectedMedium = 0, match = false; selectedMedium < Object.keys(selectedMediums).length; selectedMedium++) {
						for (var aSelectedSeries = 0; aSelectedSeries < Object.keys(selectedSeries).length; aSelectedSeries++) {
							for (var selectedCollection = 0; selectedCollection < Object.keys(selectedCollections).length; selectedCollection++) {
								if (selectedCollections[selectedCollection].getAttribute('data-series') == selectedSeries[aSelectedSeries].innerHTML &&
								filteredMedia[filteredDates[date]][media]['collection'] == selectedCollections[selectedCollection].innerHTML &&
								filteredMedia[filteredDates[date]][media]['series'] == selectedSeries[aSelectedSeries].innerHTML &&
								filteredMedia[filteredDates[date]][media]['medium'] == selectedMediums[selectedMedium].innerHTML) {
									newMedia[filteredDates[date]].push(filteredMedia[filteredDates[date]][media]);
									match = true;
									break;
								}
							}
							if (match) break;
						}
						if (match) break;
					}
				}
			}
			
			/* Remove events that aren't related to new media */
			for (var eventDate = 0; eventDate < Object.keys(filteredDates).length; eventDate++) {
				for (var event = Object.keys(newEvents[filteredDates[eventDate]]).length - 1; event >= 0 ; event--) {
					var connection = false;
					for (var mediaDate = 0; mediaDate < Object.keys(filteredDates).length; mediaDate++) {
						for (var media = 0; media < Object.keys(newMedia[filteredDates[mediaDate]]).length; media++) {
							var eventID = newEvents[filteredDates[eventDate]][event]['id'];
							var mediaID = newMedia[filteredDates[mediaDate]][media]['id'];
							for (var pair = 0; pair < Object.keys(eventMediaPairs).length; pair++) {
								if (eventMediaPairs[pair]['eventID'] == eventID &&
									eventMediaPairs[pair]['mediaID'] == mediaID) {
									connection = true;
								}
							}
						}
					}
					if (connection == false) {
						newEvents[filteredDates[eventDate]].splice(event, 1);
					}
				}
			}
			
			/* Remove events that aren't related to new media */
			for (var mediaDate = 0; mediaDate < Object.keys(filteredDates).length; mediaDate++) {
				for (var media = Object.keys(newMedia[filteredDates[mediaDate]]).length - 1; media >= 0; media--) {
					var connection = false;
					for (var eventDate = 0; eventDate < Object.keys(filteredDates).length; eventDate++) {
						for (var event = 0; event < Object.keys(newEvents[filteredDates[eventDate]]).length; event++) {
							var eventID = newEvents[filteredDates[eventDate]][event]['id'];
							var mediaID = newMedia[filteredDates[mediaDate]][media]['id'];
							for (var pair = 0; pair < Object.keys(eventMediaPairs).length; pair++) {
								if (eventMediaPairs[pair]['eventID'] == eventID &&
									eventMediaPairs[pair]['mediaID'] == mediaID) {
									connection = true;
								}
							}
						}
					}
					if (connection == false) {
						newMedia[filteredDates[mediaDate]].splice(media, 1);
					}
				}
			}
			
			filteredEvents = newEvents;
			filteredMedia = newMedia;
			drawTimeline();
		}
		
		/* Display timeline using current filters */
		function drawTimeline() {
			var newHTML = "";
			for (var dateIndex=0; dateIndex<filteredDates.length; dateIndex++) {
				if (filteredEvents[filteredDates[dateIndex]].length == 0 &&
					filteredMedia[filteredDates[dateIndex]].length == 0) {
					continue;
				}
				newHTML = newHTML + '<tr><td id="eventCell">';
				for (var eventIndex = 0; eventIndex < filteredEvents[filteredDates[dateIndex]].length; eventIndex++) {
					newHTML = newHTML + filteredEvents[filteredDates[dateIndex]][eventIndex]['name'] + '<br>';
				}
				newHTML = newHTML + '</td><td id="dateCell">' + filteredDates[dateIndex] + '</td>';
				newHTML = newHTML + '<td id="mediaCell">';
				
				for (var mediaIndex = 0; mediaIndex < filteredMedia[filteredDates[dateIndex]].length; mediaIndex++) {
					newHTML = newHTML + filteredMedia[filteredDates[dateIndex]][mediaIndex]['name'] + '<br>';
				}
				newHTML = newHTML + '</td></tr>';
			}
			document.getElementById('timeline').innerHTML = newHTML;
		}
		
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
				applySelectedFilters();
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
			<button class='filterButton selected' data-filterType='tag'>{{ $tag }}</button><br>
		@endforeach
	</div>
	
	<!-- Buttons to filter media -->
	<div id='rightButtons'>
		<p class='label'>Series</p>
		@foreach(array_keys($seriesToCollections) as $series)
			<button class='filterButton selected' data-filterType='series' data-series='{{$series}}'>{{ $series }}</button><br>
			<button class='expandCollapseButton' data-series='{{$series}}'>Show Collections</button><br>
			<div class='collectionHolder' data-series='{{$series}}'>
			@foreach($seriesToCollections[$series] as $collection)
				<button class='compactFilterButton selected' data-filterType='collection' data-series='{{$series}}'>{{ $collection }}</button><br>
			@endforeach
			</div>
		@endforeach
		<p class='label'>Mediums</p>
		@foreach($mediums as $medium)
			<button class='filterButton selected' data-filterType='medium'>{{ $medium }}</button><br>
		@endforeach
	</div>
	
	<!-- Timeline display of events and media -->
	<table id='timeline'>
		<script>
			resetData();
			applySelectedFilters();
			drawTimeline();
		</script>
	</table>
	
@endsection