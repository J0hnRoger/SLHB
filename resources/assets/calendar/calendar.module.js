'use strict';

angular
  .module('calendar', ['ngRoute'])
  .config(function($interpolateProvider, $routeProvider){
    //Scoot Template has reserved the double curly brace, so we change the Angular markup
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
    $routeProvider.
       when('/agenda-details/:eventId', {
         templateUrl: themosis.baseurl + '/resources/assets/calendar/event/event-detail.html',
         controller: 'EventCtrl'
       }).
       otherwise({
         templateUrl: themosis.baseurl + '/resources/assets/calendar/calendar/calendar.html',
         controller: 'CalendarCtrl'
       });
});
