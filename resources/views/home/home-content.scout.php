@extends('layouts.main')

@section ('header')
	@include('layouts.header')
@overwrite

@section('main')
<h1>Actualités</h1>

<div class="actualites">
@foreach($actus as $i => $actu)
	<article class="actualite">
		{{ get_the_post_thumbnail($actu->ID) }}
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

<!-- <div class="actualite mdl-cell mdl-cell--5-col mdl-cell--10-col-phone">
	<div class="mdl-layout--large-screen-only">
    {{ get_the_post_thumbnail($actu->ID) }}
	</div>
		<div class="content">
      <h2 >{{$actu->post_title}}</h2>
		</div>
    <div class="date">  <div class="day">{{ date('j', strtotime($actu->post_date)) }}</div>
			<div class="month">{{ date('M', strtotime($actu->post_date)) }}</div>
		</div>
</div>
<div class="mdl-layout-spacer"></div> -->
