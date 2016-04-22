'use strict';

angular
  .module('team-builder')
  .controller('TeamBuilderCtrl', TeamBuilderCtrl);

TeamBuilderCtrl.$inject = ['PlayersFactory', 'MatchsFactory', '$location'];
function TeamBuilderCtrl(PlayersFactory, MatchsFactory, $location) {
  var vm = this;
  vm.playersFactory = PlayersFactory;
  vm.match;
  activate();

  function activate() {
    // TODO - Ugly ... use $location
    var matchId = location.search.split('=')[location.search.split('=').length - 1];

    PlayersFactory.loadPlayers("SLHB 1");
    MatchsFactory.getMatch(matchId).then(function (match){
      PlayersFactory.setMatch(match);
      console.log(match);
    });
  }

  vm.save = function () {
    MatchsFactory.savePlayers(PlayersFactory.match)
  }

}
