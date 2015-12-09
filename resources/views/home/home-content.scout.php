@extends('layouts.main')

@section ('header')
	@include('layouts.header')
@overwrite

@section('main')

<div class="actualites mdl-grid">
@foreach($actus as $i => $actu)
<div class="actualite mdl-cell mdl-cell--5-col">
    {{ get_the_post_thumbnail($actu->ID) }}
		<div class="content">
      <h2 >{{$actu->post_title}}</h2>
			<p>{{$actu->post_content}}</p>
		</div>
    <a href="  {{ get_permalink($actu->ID) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Lire la suite <i class="material-icons">add_circle</i></a>
		<div class="date">  <div class="day">{{ date('j', strtotime($actu->post_date)) }}</div>
			<div class="month">{{ date('M', strtotime($actu->post_date)) }}</div>
		</div>
</div>
<div class="mdl-layout-spacer"></div>
@endforeach
</div>
@stop
