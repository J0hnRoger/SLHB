'use strict';

angular
  .module('calendar')
  .factory('CalendarService', CalendarService);

CalendarService.$inject = ['Day', '$http', '$q'];
function CalendarService(Day, $http, $q) {

  var self = {
    days : [],
    weeks : [],
    events : [],
    addEvents : addEvents,
    set : set,
    goToNextMonth : goToNextMonth,
    goToPreviousMonth : goToPreviousMonth
  };
  self.now = moment().date();

  function set(dateInterval) {
    if (dateInterval.year == undefined || dateInterval.month == undefined)
       throw new Error("An object formated like : { year : 2016, month : 04} is expected in parameter.");

    self.month = dateInterval.month;
    self.year = dateInterval.year;
    var objDate = new Date();
    objDate.setMonth(dateInterval.month);
    var locale = "fr-FR";
    self.monthName = objDate.toLocaleString(locale, { month: "long" });

    self.date = moment([dateInterval.year, dateInterval.month]);
    console.log(self.date.month);

    //Get the first monday of the month
    self.firstMondayOfTheMonth = moment(self.date.day(1));

    //generate new instance of moment's date for each Day instance.
    for (var weekIdx = 0; weekIdx < 5; weekIdx++) {
      self.weeks[weekIdx] = [];
      for(var i = 0; i < 7; i++){
        self.weeks[weekIdx][i] = new Day(moment(self.firstMondayOfTheMonth));
        self.weeks[weekIdx][i].isToday = (moment().date() == self.weeks[weekIdx][i].date.date())
            ? true : false;
        self.firstMondayOfTheMonth.add(1, 'days');
      }
    }
  }

  function addEvents (eventsLiterals) {
    var events = eventsLiterals.map(function (eventObj) {
      return new Event(eventObj);
    });

    self.events = self.events.concat(events);

    var eventOfCurrMonth = events.filter(function (event) {
      return event.date.month() == (self.month - 1)
        && event.date.year() == self.year;
    });

    for(var i = 0; i < eventOfCurrMonth.length; i++){
      var eventDay = self.days.find(function (day) {
        return day.number == eventOfCurrMonth[i].date.get('date');
      });
      eventDay.events.push(eventOfCurrMonth[i]);
    }
  }

  function goToNextMonth() {
    self.month++;
    set({ month : self.month, year : self.year });
  }

  function goToPreviousMonth(){
    self.month--;
    set({ month : self.month, year : self.year });
  }

  return self;
}
