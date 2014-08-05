@extends('layout')

@section('content') 
	@if(Session::has('message'))
		<p>{{Session::get('message')}}</p>
	@endif
<h1>Welcome to profile page</h1> 
@stop