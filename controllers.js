'use strict';

var adminControllers = angular.module('adminControllers', []);
var templateControllers = angular.module('templateControllers', []);
var dragModule = angular.module('dragModule', []);

dragModule.directive('myDraggable', ['$document', function($document) {
  return {
    link: function(scope, element, attr) {
      var startX = 0, startY = 0, x = 0, y = 0;

      element.css({
       position: 'relative',


       cursor: 'pointer'
      });

      element.on('dblclick', function(event)){
      function mousemove(event) {
        // Prevent default dragging of selected content
        //stupid comment
        event.preventDefault();
        startX = event.pageX - x;
        startY = event.pageY - y;
        $document.on('mousemove', mousemove);
        $document.on('mouseup', mouseup);
      });
    };
      function mousemove(event) {
        y = event.pageY - startY;
        x = event.pageX - startX;

        element.css({
          top: y + 'px',
          left:  x + 'px'
        });

      }

      function mouseup() {
        $document.off('mousemove', mousemove);
        $document.off('mouseup', mouseup);
        if(x > 200 & x < 500 ){
        element.css({
          top: 0 + 'px',
          left: 200 + 'px'
        });
      }else {
        element.css({
          top: 0 + 'px',
          left: 0 + 'px'
        });
      }
      }
    }
  };
}]);



templateControllers.controller('tempController', ['$scope', function($scope){
  $scope.customer = {
    name: 'Naomi',
    address: '1600 Amphitheatre'
  };
}])
.directive('myCustomer', function() {
  return{
    templateUrl: '../templates/ability.html'
  };
});

adminControllers.controller('spellsCtrl', ['$scope', '$http',
  function($scope, $http) {

  //JSON files to pull in data

    $http.get("spells.php")
    .success(function (response) {$scope.spells = response.records;});

    $http.get("classes.php")
    .success(function (response) {$scope.charClasses = response.records;});

    $http.get("icons.php")
    .success(function (response) {$scope.icons = response;});

    $http.get("weapons.php")
    .success(function (response) {$scope.weapons = response.records;});

    $scope.x = 10;


    $scope.titles = function(ob){
      return Object.getOwnPropertyNames(ob);
    };

    $scope.classSpecific = function(classChoice){
      return spells.Class === classChoice;
    };
    $scope.spellChoice;
    $scope.changedValue=function(choice){
        $scope.spellChoice=choice.Description;
      };
    $scope.levelFilter = function (leveler){
      return leveler.Level <= $scope.level;
    };
    $scope.iconModifier = function (record, path){
      if (record.indexOf('png') >= 0){
        record = path + record;
        console.log(record);
        return record;
      }
      return record;
    };
    $scope.containsImg = function (record){
      return (record.indexOf('png') >= 0)
    };

    $scope.spellList = [];

    $scope.addSpell = function(){

      $scope.spellList.push({
         name: $scope.selectedSpell.Name,
         description: $scope.selectedSpell.Description
      });
    };

    $scope.remove = function(index){
      $scope.spellList.splice(index, 1);
    };
}]);

danddApp.directive('myDomDirective', function () {
    return {
        link: function ($scope, element, attrs) {
            element.bind('click', function () {
                element.html('You clicked me!');

            });
            element.bind('mousedown', function () {
                element.addClass('oval');
            });
            element.bind('mouseleave', function () {
                element.removeClass('oval');
                element.css('background-color', 'white');
                element.css('height', '50px');

            });
        }
    };
});
