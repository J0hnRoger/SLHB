'use strict';

angular
  .module('calendar')
  .directive('slhbCalendar', slhbCalendar);

function slhbCalendar() {
  var directive = {
    restrict: 'EA',
    templateUrl: themosis.baseurl + '/resources/assets/calendar/calendar.directive.html',
    scope: {
      events : '<'
    },
    link: linkFunc,
    controller: 'SlhbCalendarCtrl',
    controllerAs: 'vm'
  };

  return directive;

  function linkFunc(scope, el, attr, ctrl) {
  }
}

angular
  .module('calendar')
  .controller('SlhbCalendarCtrl', SlhbCalendarCtrl)

SlhbCalendarCtrl.$inject = ['CalendarService', '$http', '$q'];
function SlhbCalendarCtrl(CalendarService){
  var vm = this;

  vm.CalendarService = CalendarService;

  init();

  function init (){
    vm.date = new Date();
    vm.CalendarService.set({ year : vm.date.getFullYear(), month : vm.date.getMonth() });
  }

  vm.next = function (){
    CalendarService.goToNextMonth();
  }

  vm.prev = function (){
    CalendarService.goToPreviousMonth();
  }

  vm.getClass = function (day){
    var classes = day.isPast ? 'fc-past' : 'fc-future';
    if (day.isToday)
      classes += ' fc-today';
    return classes;
  }

}
