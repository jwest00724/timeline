
<!-- Tag Selection -->
<script>
	var currentTags = new Array();
	
	function updateTagDisplay() {
		var tagHolderContent = '';
		for (var i=0; i<currentTags.length; i++) {
			tagHolderContent += '<button type="button" class="tag">' + currentTags[i] + '</button>'
		}
		$('#tagHolder').html(tagHolderContent);
		$('#tagSearch').val('');
	}
	
	$(document).ready(function() {
		
		$('#addTagButton').click(function() {
			if ($('#tagSearch').val() == '') {
				return;
			}
			if (currentTags.indexOf($('#tagSearch').val()) == -1) {
				currentTags.push($('#tagSearch').val());
			}
			updateTagDisplay();
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
<form id='newEventForm' role="form" method="POST" action="{{ Request::url() }}">
	
	<!-- Form -->
	{!! csrf_field() !!}
	<div class='label required'>Name</div>
	<input id='nameField' name="name" class='input' type="text">
	<div class='label'>Summary</div>
	<textarea id='summaryField' name="summary" class='input text-area'></textarea>
	<div class='label required'>Date in Timeline</div>
	<input id='dateField' name="timelineDate" class='input' type='date'>
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
	@section('saveButton')
	<button id='saveButton' type='button'>save</button>
	@endsection
	@section('resetButton')
	<button type='reset'>reset</button>
	@endsection
	@section('cancelButton')
	<button type='button'>cancel</button>
	@endsection
</form>