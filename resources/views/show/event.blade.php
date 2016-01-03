@extends('show/master')

<!-- Header -->
@section('header')
	<p class='name'>{{ $event['name'] }}</p>
@endsection

<!-- Middle Section -->
@section('middleLeft')
	<p class='label'>Summary</p>
	<p class='attribute'>{{ $event['summary'] }}</p>
@endsection

@section('middleRight')
	<p class='label'>Relevant Media</p>
	<ul>
		@foreach ($media as $thisMedia)
			<li><a href='{{ url("/showMedia", $thisMedia["id"]) }}'>{{ $thisMedia['name'] }}</a></li>
		@endforeach
	</ul>
@endsection

<!-- Footer -->
@section('bottomCenter')
	<p class='label'>Date in Timeline</p>
	<p class='attribute'>{{ $event['timelineDate'] }}</p>
@endsection

<!-- Edit and Delete Buttons -->
@section('deleteLink')
	{!! url('/deleteEvent', $event["id"]) !!}
@endsection

@section('editLink')
	{!! url('/editEvent', $event["id"]) !!}
@endsection