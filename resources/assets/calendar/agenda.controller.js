/**
 * Top Level Controller - Load Ajax Informations
 */
'use strict';

angular
  .module('calendar')
  .controller('AgendaCtrl', AgendaCtrl);

AgendaCtrl.$inject = ['EventsFactory', 'CalendarService'];
function AgendaCtrl(EventsFactory, calendarService) {
  var vm = this;
  vm.events = [];

  activate();

  function activate() {
   EventsFactory.getEvents()
      .then(function(events){
        calendarService.addEvents(events);
        calendarService.bindEvents();
   });
  }
}
