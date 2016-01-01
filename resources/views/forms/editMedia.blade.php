@extends('forms/master')

@section('formContent')
	
	<script>
		var model = <?php echo json_encode($model) ?>;
		
		$(document).ready(function() {
			$('#nameField').val(model['name']);
			$('#creditField').val(model['credit']);
			$('#summaryField').val(model['summary']);
			$('#dateField').val(model['date']);
			$('#seriesDropdown').val(model['series']);
			$('#mediumDropdown').val(model['medium']);
			
			updateCollectionDropdown();
			$('#collectionDropdown').val(model['collection']);
			if (model['collection'] != 'None') {
				$('#hiddenNumber').show();
			}
		});
	</script>
	
	@include('forms/mediaPartial')
	
@endsection