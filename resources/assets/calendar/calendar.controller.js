'use strict';

angular
  .module('calendar')
  .controller('CalendarCtrl', CalendarCtrl);

CalendarCtrl.$inject = ['EventsFactory', 'CalendarService'];
function CalendarCtrl(EventsFactory, CalendarService) {
  var vm = this;
  vm.events = [];
  vm.date;
  activate();

  function activate() {
    EventsFactory.GetEvents()
          .then(function(events){
            vm.events = events;
       });
  }
}
