'use strict';

angular
  .module('team-builder')
  .factory('MatchsFactory', MatchsFactory);

MatchsFactory.$inject = ['Match', '$http', '$q'];
function MatchsFactory(Match, $http, $q) {
  var wp_url = "/wp-json/wp/v2/slhb_match/";
  var service = {
    getMatch : GetMatch,
    savePlayers : SavePlayers,
  };

  return service;

  function SavePlayers(match) {
    var defer = $q.defer();
    $http.post('/wp-json/slhb/v1/set-players-by-team' ,
      JSON.stringify({
      	'match_id' : match.id,
        'slhb_players' : match.players
      })
    ).then(function (data){
      console.log(data);
    });
    return defer.promise;
  }

  function GetMatch(matchId) {
    var defer = $q.defer();
    $http.get(wp_url + matchId).then(function (data){
      defer.resolve(data.data);
    });
    return defer.promise;
  }

}
