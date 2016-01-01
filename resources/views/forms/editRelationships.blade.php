@extends('master')

@section('content')
	
	<script>
		var eventNames = <?php echo json_encode($eventNames) ?>;
		var mediaNames = <?php echo json_encode($mediaNames) ?>;
		var eventToMedia = <?php echo json_encode($eventToMedia) ?>;
		var mediaToEvents = <?php echo json_encode($mediaToEvents) ?>;
		var currentView = 'events';
		
		$(document).ready(function() {
			var location = '{{ Request::url() }}';
			fillTableByEvent();
			
			function fillTableByEvent() {
				var tableContent = '<thead><tr><th>Events</th><th>Media</th></tr></thead>';
				$.each(eventToMedia, function(eventID, mediaArray) {
					tableContent += rowBuilder(eventID, eventNames[eventID], mediaArray);
				});
				$('#relationships').html(tableContent);
			}
			
			function fillTableByMedia() {
				var tableContent = '<thead><tr><th>Media</th><th>Events</th></tr></thead>';
				$.each(mediaToEvents, function(mediaID, eventArray) {
					tableContent += rowBuilder(mediaID, mediaNames[mediaID], eventArray);
				});
				$('#relationships').html(tableContent);
			}
			
			function rowBuilder(leftID, leftContent, rightArray) {
				var action;
				var tableContent = '';
				tableContent += '<tr>';
				tableContent += '<td>';
				tableContent += leftContent;
				tableContent += '</td>';
				tableContent += '<td>';
				$.each(rightArray, function(id, name) {
					action = location + '/delete/';
					if (currentView == 'events') action += leftID + '/' + id;
					else action += id + '/' + leftID;
					tableContent += '<form role="form" method="POST" action="' + action + '" style="display:inline;">';
					tableContent += '{!! csrf_field() !!}';
					tableContent += '<button type="submit" class="deleteRelationshipButton">x</button>';
					tableContent += '</form>';
					tableContent += name + "<br>";
				});
				
				/* Delete relationship form */
				action = location + '/new';
				if (currentView == 'events') action += 'Media/' + leftID;
				else action += 'Event/' + leftID;
				tableContent += '<form role="form" method="POST" action="' + action + '">';
				tableContent += '{!! csrf_field() !!}';
				tableContent += '</form>';
				
				/* New relationship form */
				tableContent += '<button type="submit" data-id="' + leftID + '" class="newRelationshipButton">+</button>';
				tableContent += '<select class="newRelationshipDropdown hidden" data-id="' + leftID + '">';
				tableContent += '<option value="1">Option 1</option>';
				tableContent += '<option value="2">Option 2</option>';
				tableContent += '</select>';
				tableContent += '</td>';
				tableContent += '</tr>';
				return tableContent;
			}
			
			$('.newRelationshipButton').click(function() {
				var id = $(this).attr('data-id');
				$('.newRelationshipDropdown[data-id!=' + id + ']').hide();
				$('.newRelationshipDropdown[data-id=' + id + ']').toggle();
			});
			
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