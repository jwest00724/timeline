@extends('master')

@section('content')

	<link rel='stylesheet' type='text/css' href='{!! asset("css/show.css") !!}'>

	<div id='viewHolder'>
		@yield('showContent')
	<div>
	
@endsection