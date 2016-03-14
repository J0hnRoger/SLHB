'use strict';

angular
  .module('calendar', ['ngRoute'])
  .config(function($interpolateProvider, $routeProvider){
    //Scoot Template has reserved the double curly brace, so we change the Angular markup
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
    $routeProvider.
       when('calendrier/:ID', {
         templateUrl: themosis.baseurl + '/resources/assets/calendar/event/event-detail.html',
         controller: 'EventCtrl',
         controllerAs : 'vm'
       }).
       otherwise({
         templateUrl: themosis.baseurl + '/resources/assets/calendar/calendar/week-list.html',
         controller: 'WeekListCtrl',
         controllerAs : 'vm'
       });
});
