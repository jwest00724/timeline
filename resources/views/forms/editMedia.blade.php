@extends('forms/master')

@section('formContent')
	
	<script>
		var model = <?php echo json_encode($model) ?>;
		
		$(document).ready(function() {
			$('#nameField').val(model['name']);
			$('#summaryField').val(model['summary']);
			$('#dateField').val(model['date']);
		});
	</script>
	
	@include('forms/mediaPartial')
	
@endsection