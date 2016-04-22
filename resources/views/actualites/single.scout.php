<?php
/*
  Use $actu variable for retrieve informations on the current Post
	ID
	post_author
	post_name
	post_type
	post_title
	post_date
	post_content
	post_status
	post_modified
	comment_count
*/
?>
@extends('layouts.main')

@section('main')
	@loop

		<header>
			<h1>{{ $actu->post_title }}</h1>
			<span>{{ $actu->post_content }}</span>
		</header>

	@endloop
@stop
