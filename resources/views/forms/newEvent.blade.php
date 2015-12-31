@extends('forms/master')

@section('formContent')
	
	<script>
		
		var currentTags = new Array();
			
		$(document).ready(function() {
			
			$('#addTagButton').click(function() {
				if ($('#tagSearch').val() == '') {
					return;
				}
				
				if (currentTags.indexOf($('#tagSearch').val()) == -1) {
					currentTags.push($('#tagSearch').val());
				}
				
				var tagHolderContent = '';
				for (var i=0; i<currentTags.length; i++) {
					tagHolderContent += '<button type="button" class="tag">' + currentTags[i] + '</button>'
				}
				
				$('#tagHolder').html(tagHolderContent);
				$('#tagSearch').val('');
			});
			
			$(document).on('click', '.tag', function() {
				var index = currentTags.indexOf($(this).html());
				currentTags.splice(index, 1);
				$(this).remove();
			});
			
			$('#saveButton').click(function() {
				
				var content = '<input name="tags" value="">';
				for (var i=0; i<currentTags.length; i++) {
					content += '<input name="tags[' + i + ']" class="hidden" value="' + currentTags[i] + '">';
				}
				$('#finalTagsHolder').html(content);
				$('#newEventForm').submit();
			});
			
		});
	</script>
	
	<!-- New event form -->
	<form id='newEventForm' role="form" method="POST" action="{{ url('/newEvent') }}">
		{!! csrf_field() !!}
		<div class='label required'>Name</div>
		<input name="name" class='input' type="text">
		<div class='label'>Summary</div>
		<textarea name="summary" class='input text-area'></textarea>
		<div class='label required'>Date in Timeline</div>
		<input name="timelineDate" class='input' type='date'>
		<div class='label required'>Tags</div>
		
		<!-- Tag search and input -->
		<div class='input'>
		<div id='finalTagsHolder' class='hidden'></div>
		<input id='tagSearch' type='text' list='tagList'>
		<button type='button' id='addTagButton'>Add</button>
		<datalist id='tagList'>
			@foreach($tags as $tag)
				<option value='{{ $tag }}'>
			@endforeach
		</datalist>
		</div>
		
		<div id='tagHolder'>
			<!-- Tags will display here as they are selected. -->
		</div>
		
		<!-- Save / Cancel buttons -->
		<div class='buttonHolder'>
			<button id='saveButton' type='button' class='formButton'>Save</button>
			<button type='reset' class='formButton'>Reset</button>
			<button class='formButton'>Cancel</button>
		</div>
	</form>
	
@endsection