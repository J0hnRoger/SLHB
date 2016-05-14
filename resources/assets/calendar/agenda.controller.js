'use strict';

angular
  .module('calendar')
  .controller('AgendaCtrl', AgendaCtrl);

AgendaCtrl.$inject = ['EventsFactory'];
function AgendaCtrl(eventsFactory) {
  var vm = this;
  vm.events = [];

  activate();

  function activate() {
   eventsFactory.GetEvents()
      .then(function(events){
        vm.events = events;
   });
  }
}
