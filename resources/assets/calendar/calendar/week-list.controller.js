'use strict';

angular
  .module('calendar')
  .controller('WeekListCtrl', WeekListCtrl);

WeekListCtrl.$inject = ['EventsFactory'];
function WeekListCtrl(eventsFactory) {
  var vm = this;
  vm.events = [];

  activate();

  function activate() {
   eventsFactory.GetEvents()
      .then(function(data){
        vm.events = data;
   });
  }
}
