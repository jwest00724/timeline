@extends('forms/master')

@section('formContent')

	<script>
		var model = <?php echo json_encode($model) ?>;
		
		$(document).ready(function() {
			$('#nameField').val(model['name']);
			$('#summaryField').val(model['summary']);
			$('#dateField').val(model['date']);
			for (var i=0; i<Object.keys(model['tags']).length; i++) {
				currentTags.push(model['tags'][i]);
				updateTagDisplay();
			}
		});
	</script>
	
	@include('forms/eventPartial')
	
@endsection