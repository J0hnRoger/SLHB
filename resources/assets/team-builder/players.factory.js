'use strict';

angular
  .module('team-builder')
  .factory('PlayersFactory', PlayersFactory);

PlayersFactory.$inject = ['$http', '$q'];
function PlayersFactory($http, $q) {
  var wp_url = "/wp-json/slhb/v1/get-players-by-team";
  var match = null;
  var freePlayers = [];
  
  var service = {
    loadPlayers : LoadPlayers,
    setMatch : SetMatch,
    addPlayer : AddPlayer,
    removePlayer :RemovePlayer
  };

  return service;

  function AddPlayer(player) {
    this.match.players.push(player);
    removeObject(player, this.freePlayers);
  }

  function RemovePlayer(rmPlayer) {
    this.freePlayers.push(rmPlayer);
    removeObject(rmPlayer, this.match.players);
  }

  function SetMatch(match) {
    this.match = match;
  }

  function LoadPlayers(teamName) {
    var defer = $q.defer();
    var that = this;
    $http.get(wp_url + "?team_name=" + teamName).then(function (data){
      that.freePlayers = [];
      for (var key in data.data) {
        that.freePlayers.push(data.data[key]);
      }
      defer.resolve(that.freePlayers);
    });
    return defer.promise;
  }

  // Internal Function
  function removeObject(obj, array) {
    for(var i = 0; i < array.length; i++) {
      var player = array[i];

      if(player.ID == obj.ID){
          array.splice(i, 1);
      }
    }
  }
}
