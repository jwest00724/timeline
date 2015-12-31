@extends('forms/master')

@section('formContent')

	@include('forms/eventPartial', ['postTo' => '/newEvent'])
	
@endsection