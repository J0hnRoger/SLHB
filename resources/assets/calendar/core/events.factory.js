'use strict';

angular
  .module('calendar')
  .factory('EventsFactory', EventsFactory);

EventsFactory.$inject = ['Event', '$http', '$q'];
function EventsFactory(Event, $http, $q) {
  var wp_url = "/wp-json/wp/v2/posts";
  var service = {
    GetEvents : GetEvents
  };

  return service;

  function GetEvents() {
    var defer = $q.defer();
    $http.get(wp_url).then(function (data){

      defer.resolve(data);
    });
    return defer.promise;
  }

}
