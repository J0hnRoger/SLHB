@extends('layouts.main')

@section('main')
	@loop
		<article class="single-article">
			<div class="article--date">
				<span>{{ get_the_date('d F Y') }}</span>
			</div>
			<span class="article--title"><h2>{{ Loop::title() }}</h2></span>
			{{ Loop::thumbnail() }}
			<div class="article--excerpt clearfix">
				<div class="article--excerpt__content">
					{{ Loop::content() }}
					<div class="article--navigation clearfix">
						<?php previous_post_link('%link', 'Previous'); ?>
						<?php next_post_link('%link', 'Next'); ?>
					</div>
				</div>
			</div>
		</article>
	@endloop
@stop