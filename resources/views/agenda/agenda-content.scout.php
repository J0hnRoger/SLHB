@extends('layouts.main')

@section('main')
<style>
  .slhb-calendar.ng-enter { animation: fadeIn 0.3s both ease-in; z-index: 8888; }
  .slhb-calendar.ng-leave { animation: fadeOut 0.3s both ease-in; z-index: 9999; }

  .left-panel > ul.events > li.ng-enter { animation: flipInX 0.3s both ease-in; z-index: 8888; }
  .left-panel > ul.events > li.ng-leave { animation: flipOutX 0.3s both ease-in; z-index: 9999; }

</style>

<div class="agenda mdl-grid" ng-app="calendar" ng-controller="AgendaCtrl as vm">
  <div class="left-column mdl-shadow--8dp mdl-cell mdl-cell--5-col" >
    <h1>{{ Loop::Title()}}</h1>
    <slhb-calendar/>
  </div>
  <div class="slhb-calendar mdl-shadow--8dp mdl-cell mdl-cell--7-col" ng-view>
  </div>
</div>

@stop
