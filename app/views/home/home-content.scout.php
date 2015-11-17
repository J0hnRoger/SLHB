@extends('layouts.main')

@section('main')
<h1>Actualités</h1>

<div class="actualites mdl-grid">
@foreach($actus as $i => $actu)
<?php var_dump($actu) ?>
<div class="actualite mdl-card mdl-shadow--2dp mdl-card--horizontal mdl-cell mdl-cell--4-col">
	<div class="mdl-card__media">
    {{Loop::thumbnail($size = 'post-thumbnail')}}
  </div>
    <div class="mdl-card__title">
      <h2 class="mdl-card__title-text">{{Loop::title()}}</h2>
    </div>
    <div class="mdl-card__supporting-text">
      {{ Loop::excerpt() }}
    </div>
    <div class="mdl-card__actions mdl-card--border">
      <a href="{{Loop::link()}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">Lire la suite <i class="material-icons">add_circle</i></a>
    </div>
    <div class="mdl-card__menu">
      <a class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple"><i class="material-icons">share</i></a>
    </div>
</div>
@endforeach
</div>
@stop
