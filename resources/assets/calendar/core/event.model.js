'use strict';

angular
  .module('calendar')
  .factory('Event', Event);

function Event() {
  var Event = function (eventObject) {
    for(var prop in eventObject)
      this[prop] = eventObject[prop];

    this.ID = eventObject.id;
    moment.locale('fr');
    console.log(moment(1316116057189).fromNow());

    this.date = moment(eventObject.event_date);
    this.title = eventObject.title.rendered;
    this.content = eventObject.content.rendered;
    if (eventObject.start_time != "") {
      this.startTime = eventObject.start_time;
    }

    if (eventObject.end_time != "") {
      this.endTime = eventObject.end_time;
    }
    this.toString = function ()
    {
      return "Event : " + this.title + " - " + this.description;
    }

    this.formatedDate = this.date.format("ll");

  }

  return Event;
}
