@extends('layouts.main')

@section('main')
<div class="actualites mdl-grid">
@foreach($actus as $i => $actu)
<div class="actualite mdl-card mdl-card--horizontal mdl-cell mdl-cell--5-col">
	<div class="mdl-card__media">
    {{ get_the_post_thumbnail($actu->ID) }}
  </div>
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">{{$actu->post_title}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
			{{$actu->post_content}}
    </div>
    <div class="mdl-card__actions">
      <a href="  {{ get_permalink($actu->ID) }}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Lire la suite <i class="material-icons">add_circle</i></a>
    </div>
    <div class="mdl-card__menu">
			<!-- <div class="label">  {{ date('j F Y', strtotime($actu->post_date)) }}</div> -->
    </div>
</div>
<div class="mdl-layout-spacer"></div>
@endforeach
</div>
@stop
