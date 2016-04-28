'use strict';

angular
  .module('calendar')
  .controller('EventListCtrl', EventListCtrl);

EventListCtrl.$inject = ['EventsFactory'];
function EventListCtrl(eventsFactory) {
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
