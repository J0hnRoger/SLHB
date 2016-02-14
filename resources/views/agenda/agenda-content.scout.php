@extends('layouts.main')

@section('main')

<div>
  <h1 class="mdl-layout--large-screen-only">Agenda 2016</h1>
<div class="agenda mdl-grid" ng-app="calendar">
  <div class="timeline-container mdl-shadow--8dp">
  <div class="timeline ">
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
  </div>
	<div class="animated slideInRight" ng-view></div>
</div>

@stop
