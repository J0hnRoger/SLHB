'use strict';

angular
  .module('calendar')
  .directive('slhb', slhb);

function slhb() {
  var directive = {
    restrict: 'EA',
    templateUrl: themosis.baseurl + '/resources/assets/calendar/calendar.directive.html',
    scope: {},
    link: linkFunc,
    controller: 'SlhbCalendarCtrl',
    controllerAs: 'vm'
  };

  return directive;

  function linkFunc(scope, el, attr, ctrl) {
    console.log("Passed");
  }
}

angular
  .module('calendar')
  .controller('SlhbCalendarCtrl', SlhbCalendarCtrl)

SlhbCalendarCtrl.$inject = ['CalendarService', '$http', '$q'];
function SlhbCalendarCtrl(CalendarService){
  var vm = this;
  vm.CalendarService = CalendarService;
  var date = new Date();
  vm.CalendarService.set({ year : date.getFullYear(), month : date.getMonth() });

  vm.next = function (){
    CalendarService.goToNextMonth();
  }

  vm.prev = function (){
    CalendarService.goToPreviousMonth();
  }

}
