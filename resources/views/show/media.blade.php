@extends('show/master')

@section('showContent')
	<div class='panelHolder'>
		<p class='name'>{{ $media['name'] }}</p>
		
		<p class='collection'>
		{{ $media['series'] }} - 
		{{ $media['collection'] }}
		@if($media['numberInCollection'] != NULL)
			<p class='collection number'>{{ $media['numberInCollection'] }}</p>
		@endif
		</p>
	</div>
	<hr class='clear'>
	
	<div class='panelHolder'>
		<div class='leftPanel'>
			<p class='label'>Summary</p>
			<p class='attribute'>{{ $media['summary'] }}</p>
		</div>
		
		<div class='rightPanel'>
			<p class='label'>Relevant Events</p>
			<ul>
				@foreach ($events as $event)
					<li>{{ $event['name'] }}</li>
				@endforeach
			</ul>
		</div>
	</div>
	<hr class='clear'>
	
	<div class='panelHolder'>
		<div class='bottomLeft'>
			<p class='label'>Medium</p>
			<p class='attribute'>{{ $media['medium'] }}</p>
		</div>
		
		<div class='bottomRight'>
			<p class='label'>Credit</p>
			<p class='attribute'>{{ $media['credit'] }}</p>
		</div>
		
		<div class='bottomCenter'>
			<p class='label'>Date in Timeline</p>
			<p class='attribute'>{{ $media['timelineDate'] }}</p>
		</div>
	</div>
	
@endsection