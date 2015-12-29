@extends('forms/master')

@section('formContent')
	
	<!-- Form validation errors -->
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	
	<!-- New event form -->
	<form role="form" method="POST" action="{{ url('/newEvent') }}">
		{!! csrf_field() !!}
		<button type="submit">Submit Test</button>
	</form>
	
@endsection