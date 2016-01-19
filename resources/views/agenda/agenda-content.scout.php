@extends('layouts.main')

@section('main')
<h1 class="mdl-layout--large-screen-only">Agenda 2016</h1>
<div class="agenda mdl-grid">
<div class="timeline mdl-shadow--8dp">
  <ul>
    <li>
      <span class="num">1</span>
      <span class="month">sep</span>
    </li>
    <li><span class="num">2</span><span class="month">sep</span></li>
    <li class="selected"><span class="num">3</span><span class="month">sep</span></li>
    <li><span class="num">4</span><span class="month">sep</span></li>
    <li><span class="num">5</span><span class="month">sep</span></li>
    <li><span class="num">6</span><span class="month">sep</span></li>
    <li><span class="num">7</span><span class="month">sep</span></li>
  </ul>
</div>
<div class="left-panel header">
  <div class="header mdl-shadow--3dp">
    <span class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab count">3</span>
    <h4>September</h4>
  </div>
  <ul>
    <li>
      <div class="hour">12:00</div>
      <span class="descr">Stage jeune</span>
    </li>
    <li>
      <div class="hour">18:30</div>
      <span class="descr">Tournoi de hand sur gazon</span>
    </li>
    <li>
      <div class="hour">21:00</div>
      <span class="descr">Fête du hand à la salle</span>
    </li>
  </ul>
</div>

</div>
@stop
