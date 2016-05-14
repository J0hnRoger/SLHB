@extends('layouts.main')

@section('main')

<div>
<div class="agenda mdl-grid" ng-app="calendar" ng-controller="AgendaCtrl as vm">
  <div class="left-column animated slideInRight mdl-shadow--8dp mdl-cell mdl-cell--5-col" >
    <h1>{{ Loop::Title()}}</h1>
    <slhb-calendar/>
  </div>
  <div class="slhb-calendar animated slideInRight mdl-shadow--8dp mdl-cell mdl-cell--7-col" ng-view>
  </div>
</div>

@stop
