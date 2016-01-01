<script>
	
	function updateCollectionDropdown() {
		var seriesDropdown = document.getElementById('seriesDropdown');
		var selected = seriesDropdown.options[seriesDropdown.selectedIndex].text;
		var selectedAbbr = seriesDropdown.options[seriesDropdown.selectedIndex].value;
		var collectionHTML = "<option value='' selected> --- Select a collection --- </option>";
		if (selectedAbbr != 'newSeries') {
			var seriesToCollections = <?php echo json_encode($seriesToCollections) ?>;
			var collections = seriesToCollections[selectedAbbr];
			for (var i = 0; i < Object.keys(collections).length; i++) {
				if (collections[i] == 'None') {
					continue;
				}
				collectionHTML += '<option name="collection" value="' + collections[i] + '">' + collections[i] + '</option>';
			}
		}
		collectionHTML += '<option name="collection" value="None">None</option>';
		collectionHTML += '<option name="collection" value="newCollection">New Collection</option>';
		document.getElementById('collectionDropdown').innerHTML = collectionHTML;
	}
	
	$(document).ready(function() {
		
		/*
		** Show/hide form to create new series. Also update collection
		** dropdown to match the selected series.
		*/
		$('#seriesDropdown').change(function() {
			var selected = this.options[this.selectedIndex].text;
			var selectedAbbr = $(this.options[this.selectedIndex]).attr('value');
			if (selected == 'New Series') {
				$('#hiddenSeries').slideDown();
			} else {
				$('#hiddenSeries').slideUp();
			}
			updateCollectionDropdown();
		});
		
		/* Show/hide form to create new medium */
		$('#mediumDropdown').change(function() {
			var selected = this.options[this.selectedIndex].text;
			if (selected == 'New Medium') {
				$('#hiddenMedium').slideDown();
			} else {
				$('#hiddenMedium').slideUp();
			}
		});
		
		/* Show/hide form to create new collection */
		$('#collectionDropdown').change(function() {
			var selected = this.options[this.selectedIndex].text;
			if (selected == 'None') {
				$('#hiddenNumber').slideUp();
				$('#hiddenCollection').slideUp();
			} else if (selected == 'New Collection') {
				$('#hiddenNumber').slideDown();
				$('#hiddenCollection').slideDown();
			} else {
				$('#hiddenNumber').slideDown();
				$('#hiddenCollection').slideUp();
			}
		});
		
	});
	
</script>

<!-- New event form -->
<form role="form" method="POST" action="{{ Request::url() }}">
	{!! csrf_field() !!}
	
	<!-- Name -->
	<div class='label required'>Name</div>
	<input id='nameField' name="name" class='input' type="text">
	
	<!-- Credit -->
	<div class='label'>Credit (Author/Director/Developer)</div>
	<input id='creditField' name="credit" class='input' type="text">
	
	<!-- Series -->
	<div class='label required'>Series</div>
	<select class='input' name='series' id='seriesDropdown'>
		<option value='' selected> --- Select a series --- </option>
		@foreach($series as $aSeries)
			<option name='series' value='{{ $aSeries }}'>{{ $seriesAbbrToName[$aSeries] }}</option>
		@endforeach
		<option name='series' value='newSeries'>New Series</option>
	</select>
	
	<div class='hidden' id='hiddenSeries'>
		<div class='label'>New Series Abbreviation</div>
		<input name='newSeriesAbbr', class='input', type='text'>
		<div class='label'>New Series Name</div>
		<input name='newSeriesName', class='input', type='text'>
	</div>
	
	<!-- Collection -->
	<div class='label required'>Collection</div>
	<select class='input' name='collection' id='collectionDropdown'>
		<option value='' selected> --- Select a series to see collections --- </option>
	</select>
	
	<div class='hidden' id='hiddenCollection'>
		<div class='label'>New Collection Name</div>
		<input name='newCollectionName', class='input', type='text'>
	</div>
	
	<div class='hidden' id='hiddenNumber'>
		<div class='label'>Number in Collection</div>
		<input id='numberField' name="numberInCollection" class='input' type="number" min='1'>
	</div>
	
	<!-- Medium -->
	<div class='label required'>Medium</div>
	<select class='input' name='medium' id='mediumDropdown'>
		<option value='' selected> --- Select a medium --- </option>
		@foreach($mediums as $medium)
			<option name='medium' value='{{ $medium }}'>{{ $medium }}</option>
		@endforeach
		<option name='medium' value='newMedium'>New Medium</option>
	</select>
	
	<div class='hidden' id='hiddenMedium'>
		<div class='label'>New Medium Name</div>
		<input name='newMediumName' class='input' type='text'>
	</div>
	
	<!-- Summary -->
	<div class='label'>Summary</div>
	<textarea id='summaryField' name="summary" class='input text-area'></textarea>
	
	<!-- Timeline Date -->
	<div class='label required'>Date in Timeline</div>
	<input id='dateField' name="timelineDate" class='input' type='date'>
	
	<!-- Save/Reset/Cancel Buttons -->
	<div class='buttonHolder'>
		<button type='submit' class='formButton'>Save</button>
		<button type='reset' class='formButton'>Reset</button>
		<button class='formButton'>Cancel</button>
	</div>
</form>