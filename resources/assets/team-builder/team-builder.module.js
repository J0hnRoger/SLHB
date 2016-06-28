'use strict';

angular.module('appHand')
  .requires.push('team-builder');

angular
  .module('team-builder', ['ngRoute', 'ngSanitize'])
  .config(function($interpolateProvider, $routeProvider){
    //Scoot Template has reserved the double curly brace, so we change the Angular markup
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
});
