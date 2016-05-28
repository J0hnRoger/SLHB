'use strict';

angular
  .module('calendar')
  .factory('Event', Event);

function Event() {

  var Event = function (eventObject) {
    this.ID = eventObject.id;
    this.date = moment(eventObject.event_date);
    this.title = eventObject.title.rendered;
    this.content = eventObject.content.rendered;
    this.toString = function ()
    {
      return "Event : " + this.title + " - " + this.description;
    }
    this.formatedDate = this.date.format("MMM Do");
  }

  return Event;
}
