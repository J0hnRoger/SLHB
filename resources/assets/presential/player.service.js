'use strict';

angular
  .module('presential')
  .factory('PlayersService', PlayersService);

PlayersService.$inject = ['$q', '$http'];
function PlayersService($q, $http) {
  var url = '/wp-json/slhb/v1/set-presential';
  var service = {
    setPresential : SetPresential,
  };

  return service;

  function SetPresential(userId, isPresent) {
    var defer = $q.defer();
    $http.post(url ,
      JSON.stringify({
        'present' : isPresent,
        'userId' : userId
      })
    ).then(function (data){
      defer.resolve(data);
    });
    return defer.promise;
  }

}
