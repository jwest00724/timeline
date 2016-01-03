@extends('show/master')

<!-- Header -->	
@section('header')
	<p class='name'>{{ $media['name'] }}</p>
	<p class='collection'>
	{{ $media['series'] }} - 
	{{ $media['collection'] }}
	@if($media['numberInCollection'] != NULL)
		<p class='collection number'>{{ $media['numberInCollection'] }}</p>
	@endif
	</p>
@endsection

<!-- Middle Section -->
@section('middleLeft')
	<p class='label'>Summary</p>
	<p class='attribute'>{{ $media['summary'] }}</p>
@endsection

@section('middleRight')
	<p class='label'>Relevant Events</p>
	<ul>
		@foreach ($events as $event)
			<li>{{ $event['name'] }}</li>
		@endforeach
	</ul>
@endsection
	
<!-- Footer -->
@section('bottomLeft')
	<p class='label'>Medium</p>
	<p class='attribute'>{{ $media['medium'] }}</p>
@endsection

@section('bottomRight')
	<p class='label'>Credit</p>
	<p class='attribute'>{{ $media['credit'] }}</p>
@endsection

@section('bottomCenter')
	<p class='label'>Date in Timeline</p>
	<p class='attribute'>{{ $media['timelineDate'] }}</p>
@endsection

<!-- Edit and Delete Buttons -->
@section('deleteLink')
	delete
@endsection

@section('editLink')
	{!! url('/editMedia', $media["id"]) !!}
@endsection

