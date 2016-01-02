@extends('show/master')

@section('showContent')
	<p class='name'>{{ $media['name'] }}</p>
	
	<p class='collection'>
	{{ $media['series'] }} - 
	{{ $media['collection'] }}
	@if($media['numberInCollection'] != NULL)
		<p class='collection number'>{{ $media['numberInCollection'] }}</p>
	@endif
	</p>
	
	<p class='label'>Credit</p>
	<p>{{ $media['credit'] }}</p>
	{{ $media['medium'] }}<br>
	{{ $media['summary'] }}<br>null
	{{ $media['timelineDate'] }}<br>
	
	Relevant Events:<br>
	@foreach ($events as $event)
		{{ $event['name'] }}<br>
	@endforeach
@endsection