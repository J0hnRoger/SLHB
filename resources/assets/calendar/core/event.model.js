'use strict';

angular
  .module('calendar')
  .factory('Event', Event);

function Event() {

  var Event = function (eventObject) {
    this.ID = eventObject.id;
    this.date = moment(eventObject.date);
    this.title = eventObject.title;
    this.description = eventObject.description;
    this.toString = function ()
    {
      return "Event : " + this.title + " - " + this.description;
    }
  }

  return Event;
}
