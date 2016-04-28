/*
 * Responsabilité : en fonction du mois, nous fournir une liste d'Events
*/

'use strict';

angular
  .module('calendar')
  .factory('EventsFactory', EventsFactory);

EventsFactory.$inject = ['Event', '$http', '$q'];
function EventsFactory(Event, $http, $q) {
  var events = [];
  var wp_url = "/wp-json/wp/v2/posts";
  var service = {
    GetEvents : GetEvents
  };

  return service;

  function GetEvents() {
    var defer = $q.defer();
    if (events.length == 0)
    {
      $http.get(wp_url).then(function (data){
        events = data.data.map( (jsonObject) => new Event(jsonObject) );
        defer.resolve(events);
      });
    }
    else {
      defer.resolve(events);
    }
    return defer.promise;
  }

}
