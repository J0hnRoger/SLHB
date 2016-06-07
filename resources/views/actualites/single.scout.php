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
	<div class="details-actualite">
		<header>
			<h1>{{ $actu->post_title }}</h1>
			<div class="sub-infos">{{ $actu->formated_modified_date }}</div>
		</header>
		<section>
			{{ $actu->post_content }}
		</section>

	</div>
	@section('bottom-banner')
	<div class="related">
		<div class="related-center">
			@if (!empty( $previous_post ))
			<a class="read-next-story" style="background: url({{ get_the_post_thumbnail_url($previous_post->ID, [330, 330]) }}) top / cover" href="{{ get_permalink($previous_post->ID) }}">
        <section class="post">
            <h2>{{$previous_post->post_title}}</h2>
            <p>{{ substr($previous_post->post_content, 0, 120).'...' }}</p>
        </section>
    	</a>
			@endif
			@if (!empty( $next_post ))
			<a class="read-next-story" style="background: url({{ get_the_post_thumbnail_url($next_post->ID, [330, 330]) }}) top / cover" href="{{ get_permalink($next_post->ID) }}">
				<section class="post">
						<h2>{{$next_post->post_title}}</h2>
						<p>{{ substr($next_post->post_content, 0, 120).'...' }}</p>
				</section>
			</a>
			@endif
		</div>
	</div>

	@overwrite
	@endloop
@stop
