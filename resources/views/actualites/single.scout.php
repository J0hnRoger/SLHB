@extends('layouts.main')

@section('main')
	@loop
		
		<header>
			<h1>{{ Loop::title() }}</h1>
			<span>{{ Loop::content() }}</span>			
		</header>
	@endloop
@stop
