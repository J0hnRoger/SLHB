@extends('layouts.main')

@section('main')

<div>
<div class="agenda mdl-grid" ng-app="calendar">
  <div class="left-column animated slideInRight mdl-shadow--8dp" >
    <h1>Left Column</h1>
  </div>
  <div class="slhb-calendar animated slideInRight mdl-shadow--8dp">
  </div>
	<div class="animated slideInRight" ng-view></div>
</div>

@stop
