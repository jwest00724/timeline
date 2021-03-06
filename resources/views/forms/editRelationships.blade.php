@extends('master')

@section('content')
	
	<link rel='stylesheet' type='text/css' href='{!! asset("css/relationships.css") !!}'>
	
	<script>
		var eventNames = <?php echo json_encode($eventNames) ?>;
		var mediaNames = <?php echo json_encode($mediaNames) ?>;
		var eventToMedia = <?php echo json_encode($eventToMedia) ?>;
		var mediaToEvents = <?php echo json_encode($mediaToEvents) ?>;
		var currentView = localStorage.getItem("currentView");
		if (currentView == null) currentView = 'events';
		
		$(document).ready(function() {
			
			/* Remember scroll position from previous visit */
			if ("scrollPosition" in localStorage) {
				$('html,body').animate({scrollTop: localStorage.scrollPosition}, 1);
			}
			$(window).on('scroll', function() {
				localStorage.scrollPosition = $(window).scrollTop();
			});
			
			/* Remember view selection from previous visit */
			var location = '{{ Request::url() }}';
			if (currentView == 'media') {
				fillTableByMedia();
			} else {
				fillTableByEvent();
			}
			
			/* Order table by event */
			function fillTableByEvent() {
				var tableContent = '<thead><tr><th>Events</th><th>Media</th></tr></thead>';
				$.each(eventToMedia, function(eventID, mediaArray) {
					tableContent += rowBuilder(eventID, eventNames[eventID], mediaArray);
				});
				$('#relationships').html(tableContent);
			}
			
			/* Order table by media */
			function fillTableByMedia() {
				var tableContent = '<thead><tr><th>Media</th><th>Events</th></tr></thead>';
				$.each(mediaToEvents, function(mediaID, eventArray) {
					tableContent += rowBuilder(mediaID, mediaNames[mediaID], eventArray);
				});
				$('#relationships').html(tableContent);
			}
			
			/* Fill one row in the relationships table */
			function rowBuilder(leftID, leftContent, rightArray) {
				var action;
				var tableContent = '';
				tableContent += '<tr>';
				tableContent += '<td>';
				tableContent += leftContent;
				tableContent += '</td>';
				tableContent += '<td>';
				
				/* Delete relationship form */
				$.each(rightArray, function(id, name) {
					action = location + '/delete/';
					if (currentView == 'events') action += leftID + '/' + id;
					else action += id + '/' + leftID;
					tableContent += '<form role="form" method="POST" action="' + action + '" style="display:inline;">';
					tableContent += '{!! csrf_field() !!}';
					tableContent += '<div style="clear:right;"><button type="submit" class="deleteRelationshipButton">x</button>';
					tableContent += '<div class="indented">' + name + '</div></div></form>';
				});
				
				/* New relationship form */
				action = location + '/new';
				if (currentView == 'events') action += 'Media/' + leftID;
				else action += 'Event/' + leftID;
				tableContent += '<form class="newRelationshipForm" data-id="' + leftID + '" role="form" method="POST" action="' + action + '">';
				tableContent += '{!! csrf_field() !!}';
				tableContent += '<div style="clear:right;"><button type="button" data-id="' + leftID + '" class="newRelationshipButton">+</button>';
				tableContent += '<select name="newItem" class="newRelationshipDropdown hidden" data-id="' + leftID + '">';
				tableContent += '<option value=""> --- Select a relationship --- </option>';
				var optionNames = (currentView == 'events' ? mediaNames : eventNames);
				$.each(optionNames, function(id, name) {
					tableContent += '<option value=' + id + '>' + name + '</option>';
				});
				tableContent += '</select>';
				tableContent += '</form>';
				tableContent += '</div>';
				tableContent += '</td>';
				tableContent += '</tr>';
				return tableContent;
			}
			
			/* Show new relationship form */
			$(document).on('click', '.newRelationshipButton', function() {
				var id = $(this).attr('data-id');
				$('.newRelationshipDropdown').val('');
				$('.newRelationshipDropdown[data-id!=' + id + ']').hide();
				$('.newRelationshipDropdown[data-id=' + id + ']').toggle();
			});
			
			/* Submit new relationship form */
			$(document).on('change', '.newRelationshipDropdown', function() {
				var id = $(this).attr('data-id');
				$('.newRelationshipForm[data-id=' + id + ']').submit();
			});
			
			/* Toggle view ordering */
			$('#toggleViewButton').click(function() {
				if (currentView == 'events') {
					currentView = 'media';
					fillTableByMedia();
				} else {
					currentView = 'events';
					fillTableByEvent();
				}
				localStorage.setItem('currentView', currentView);
			});
			
		});
	</script>
	
	
	<!-- Button to change the table view -->
		<div id='toggleViewButtonHolder'>
			<button type='button' id='toggleViewButton'><< = >></button>
		</div>
	
	<!-- Table view of relationships -->
		<table id='relationships'></table>
		
@endsection