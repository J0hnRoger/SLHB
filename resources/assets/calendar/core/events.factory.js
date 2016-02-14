'use strict';

angular
  .module('calendar')
  .factory('EventsFactory', EventsFactory);

EventsFactory.$inject = ['Event'];
function EventsFactory(Event) {
  var service = {
    GetEvents : GetEvents
  };

  return service;

  function GetEvents() {
    return "event1";
  }
}
