@extends('master')

@section('content')
	
	<script>
		var eventNames = <?php echo json_encode($eventNames) ?>;
		var mediaNames = <?php echo json_encode($mediaNames) ?>;
		var eventToMedia = <?php echo json_encode($eventToMedia) ?>;
		var mediaToEvents = <?php echo json_encode($mediaToEvents) ?>;
		var currentView = 'events';
		
		$(document).ready(function() {
			
			fillTableByEvent();
			
			function fillTableByEvent() {
				var tableContent = '<thead><tr><th>Events</th><th>Media</th></tr></thead>';
				$.each(eventToMedia, function(eventID, mediaArray) {
					tableContent += rowBuilder(eventNames[eventID], mediaArray);
				});
				$('#relationships').html(tableContent);
			}
			
			function fillTableByMedia() {
				var tableContent = '<thead><tr><th>Media</th><th>Events</th></tr></thead>';
				$.each(mediaToEvents, function(mediaID, eventArray) {
					tableContent += rowBuilder(mediaNames[mediaID], eventArray);
				});
				$('#relationships').html(tableContent);
			}
			
			function rowBuilder(leftContent, rightArray) {
				var tableContent = '';
				tableContent += '<tr>';
				tableContent += '<td>';
				tableContent += leftContent;
				tableContent += '</td>';
				tableContent += '<td>';
				$.each(rightArray, function(id, name) {
					tableContent += '<button type="button" class="deleteRelationshipButton">x</button>';
					tableContent += name + "<br>";
				});
				tableContent += '</td>';
				tableContent += '</tr>';
				return tableContent;
			}
			
			$('#toggleViewButton').click(function() {
				if (currentView == 'events') {
					currentView = 'media';
					fillTableByMedia();
				} else {
					currentView = 'events';
					fillTableByEvent();
				}
			});
			
		});
	</script>
	
	<div id='toggleViewButtonHolder'><button type='button' id='toggleViewButton'>< --- ></button></div>
	<table id='relationships'></table>
@endsection