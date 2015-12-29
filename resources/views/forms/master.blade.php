@extends('master')

@section('content')

	<!-- Form validation errors -->
	@if (count($errors) > 0)
		<div class='errorHolder'>
		<div class="errors">
			There were some problems with your input:
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div></div>
	@endif
	
	<div class='formHolder'>
		@yield('formContent')
	</div>
@endsection