@extends('layouts.main')

@section('main')
<style>

.slhb-calendar.ng-enter, .slhb-calendar.ng-leave {
  -webkit-animation-duration: .5s;
    -webkit-animation-fill-mode:both;
  }
  .right .slhb-calendar.ng-enter { -webkit-animation-name: slideInRight; }
  .right .slhb-calendar.ng-leave { -webkit-animation-name:  slideOutLeft; }

  .left .slhb-calendar.ng-enter { -webkit-animation-name: slideInLeft; }
  .left .slhb-calendar.ng-leave { -webkit-animation-name:  slideOutRight; }

   ul.events > li.ng-enter { animation: flipInX 0.3s both ease-in; z-index: 8888; }
   ul.events > li.ng-leave { animation: flipOutX 0.3s both ease-in; z-index: 9999; }
   ul.events > li.ng-enter-stagger {
    /* this will have a 100ms delay between each successive leave animation */
    -webkit-transition-delay: 1s;
    transition-delay: 1s;
  }
</style>

<div ng-controller="AgendaCtrl as vm" class="agenda mdl-grid {[vm.direction]}" >
  <nav id="btn-navigation" class="navigation--button">
    <div class="material--burger {[vm.btnAnimation]}" ng-click="vm.go('#/')">
      <span></span>
    </div>
  </nav>
  <div class="left-column mdl-shadow--8dp mdl-cell mdl-cell--5-col mdl-cell--12-col-phone" >
    <h1>{{ Loop::Title()}}</h1>
    <slhb-calendar/>
  </div>
  <div class="slhb-calendar mdl-shadow--8dp mdl-cell mdl-cell--7-col mdl-cell--12-col-phone " ng-view>
  </div>

</div>

@stop
