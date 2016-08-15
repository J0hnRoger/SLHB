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