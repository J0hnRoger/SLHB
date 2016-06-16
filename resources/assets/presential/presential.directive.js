
'use strict';

angular
  .module('presential')
  .directive('isPresent', isPresent);

function isPresent() {
  var directive = {
    restrict: 'EA',
    templateUrl: '/content/themes/SLHB/resources/assets/presential/presential.html',
    scope: {
      init : '@'
    },
    controller: IsPresentCtrl,
    controllerAs: 'vm',
    bindToController: true
  };

  return directive;

}

IsPresentCtrl.$inject = ['$element', 'PlayersService'];
function IsPresentCtrl($element, PlayersService) {
  var vm = this;

  vm.isPresent = (parseInt(vm.init) == 0) ? false : true;
  if (vm.isPresent)
    $element.find('#presential-switch').click();

  vm.label = ((vm.isPresent) ? "Présent" : "Absent" );

  vm.changeLabel = function () {
    PlayersService.setPresential(themosis.userId, vm.isPresent);
    vm.label = ((vm.isPresent) ? "Présent" : "Absent" );
  }


}
