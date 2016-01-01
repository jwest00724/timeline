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
					tableContent += '<tr>';
					tableContent += '<td>';
					tableContent += eventNames[eventID];
					tableContent += '</td>';
					tableContent += '<td>';
					$.each(mediaArray, function(mediaID, mediaName) {
						tableContent += mediaName + "<br>";
					});
					tableContent += '</td>';
					tableContent += '</tr>';
				});
				$('#relationships').html(tableContent);
			}
			
			function fillTableByMedia() {
				var tableContent = '<thead><tr><th>Media</th><th>Events</th></tr></thead>';
				$.each(mediaToEvents, function(mediaID, eventArray) {
					tableContent += '<tr>';
					tableContent += '<td>';
					tableContent += mediaNames[mediaID];
					tableContent += '</td>';
					tableContent += '<td>';
					$.each(eventArray, function(eventID, eventName) {
						tableContent += eventName + "<br>";
					});
					tableContent += '</td>';
					tableContent += '</tr>';
				});
				$('#relationships').html(tableContent);
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