@extends('master')

@section('content')
	
	<link rel='stylesheet' type='text/css' href='{!! asset("css/show.css") !!}'>

	<div id='viewHolder'>
		
		<!-- Header -->
		<div class='panelHolder'>
			@yield('header')
		</div>
		<hr class='clear'>
		
		<!-- Middle Section -->
		<div class='panelHolder'>
			<div class='leftPanel'>
				@yield('middleLeft')
			</div>
			
			<div class='rightPanel'>
				@yield('middleRight')
			</div>
		</div>
		<hr class='clear'>

		<!-- Footer -->
		<div class='panelHolder'>
			<div class='bottomLeft'>
				@yield('bottomLeft')
			</div>
			
			<div class='bottomRight'>
				@yield('bottomRight')
			</div>
			
			<div class='bottomCenter'>
				@yield('bottomCenter')
			</div>
		</div>
	</div>
	
	<!-- Edit and Delete Buttons -->
	<div class='tabButton'>
		<a href='@yield("deleteLink")' onclick='return confirm("This entry will be deleted.")'>delete</a>
	</div>
	
	<div class='tabButton'>
		<a href='@yield("editLink")'>edit</a>
	</div>
	
@endsection