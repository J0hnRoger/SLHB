@extends('layouts.main')

@section ('header')
	@include('layouts.header')
@overwrite

@section('main')
<h1>Actualités</h1>

<div class="actualites">
@foreach($actus as $i => $actu)
	<article class="actualite">
		@if (has_post_thumbnail($actu->ID))
		{{  get_the_post_thumbnail($actu->ID) }}
		@else
		<img src="{{  $actu_default_image }}" alt="" />
		@endif
		<div class="actualite-content">
			<h2 >{{$actu->post_title}}</h2>
			<div class="excerpt">
				{{ wp_trim_words( $actu->post_content, 35) }}
			</div>
			<a href="  {{ get_permalink($actu->ID) }}" class="read-more" ><span>Lire la suite</span> <i class="material-icons">add_circle</i></a>
		</div>
	</article>
@endforeach
</div>
@stop
