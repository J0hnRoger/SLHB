'use strict';

angular.module('appHand')
  .requires.push('team-builder');

angular
  .module('team-builder', ['ngRoute', 'ngSanitize'])
  .config(function($interpolateProvider, $routeProvider){
    //Scoot Template has reserved the double curly brace, so we change the Angular markup
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
});

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

(function() {
	'use strict';

	angular
		.module('team-builder')
		.component('playersPicker', {
			templateUrl : '/content/themes/SLHB/resources/assets/team-builder/players-picker.html'
		});
})();
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
    loadFreePlayers : LoadFreePlayers,
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
    this.match = match.slhb_match_meta;
    this.match.id = match.id;
    this.match.players = match.slhb_players.length > 0 ? match.slhb_players : [];
  }

  function LoadFreePlayers() {
    var defer = $q.defer();
    var that = this;
    $http.get(wp_url + "?team_name=" + this.match.match_team_dom[0]).then(function (data){
      that.freePlayers = [];
      for (var key in data.data) {
        if (!containsId(that.match.players, data.data[key].ID))
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

  function containsId(objects, id) {
      for (var i = 0; i < objects.length; i++) {
          if (objects[i].ID == id) {
              return true;
          }
      }
      return false;
  }
}

(function() {
	'use strict';

	angular
		.module('team-builder')
		.component('teamBuilder', {
			templateUrl : '/content/themes/SLHB/resources/assets/team-builder/team-builder.html'
		});
})();
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

    MatchsFactory.getMatch(matchId).then(function (match){
      PlayersFactory.setMatch(match);
      PlayersFactory.loadFreePlayers();
    });
  }

  vm.save = function () {
    MatchsFactory.savePlayers(PlayersFactory.match)
  }
}

(function() {
	'use strict';

	angular
		.module('team-builder')
		.component('teamSheet', {
			templateUrl : '/content/themes/SLHB/resources/assets/team-builder/team-sheet.html'
		});
})();
(function() {
	'use strict';

	angular
		.module('team-builder')
		.component('teamsList', {
			templateUrl : '/content/themes/SLHB/resources/assets/team-builder/teams-list.html'
		});

	// teamsList.$inject = [];
	function teamsList() {
		// Usage:
		//
		// Creates:
		//
		var directive = {
			bindToController: true,
			controller: ControllerController,
			controllerAs: 'vm',
			link: link,
			restrict: 'A',
			scope: {
			}
		};
		return directive;
		
		function link(scope, element, attrs) {
		}
	}
	/* @ngInject */
	function ControllerController () {
		
	}
})();
'use strict';

angular
  .module('team-builder')
  .factory('Match', Match);

function Match() {
  var service = {
  };

  return service;
}
