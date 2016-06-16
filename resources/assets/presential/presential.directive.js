
'use strict';

angular
  .module('presential')
  .directive('isPresent', isPresent)
  .controller('isPresentCtrl',  IsPresentCtrl);

function isPresent() {
  var directive = {
    restrict: 'EA',
    templateUrl: '/content/themes/SLHB/resources/assets/presential/presential.html',
    scope: {},
    controller: 'isPresentCtrl',
    controllerAs: 'vm',
    bindToController: true
  };

  return directive;

}

function IsPresentCtrl() {
  var vm = this;
  vm.isPresent = true;
  changeLabel();

  vm.changeLabel = changeLabel;

  function changeLabel  () {
    vm.label = ((vm.isPresent) ? "Présent" : "Absent" );
  }
}
