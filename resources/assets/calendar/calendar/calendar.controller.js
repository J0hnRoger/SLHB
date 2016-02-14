'use strict';

angular
  .module('calendar')
  .controller('CalendarCtrl', CalendarCtrl);

CalendarCtrl.$inject = ['EventsFactory'];
function CalendarCtrl(EventsFactory) {
  var vm = this;

  activate();

  function activate() {
   vm.event =  EventsFactory.GetEvents();
  }
}
