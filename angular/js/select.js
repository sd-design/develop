angular.module('ngrepeatSelect', [])
 .controller('ExampleController', ['$scope', function($scope) {
   $scope.data = {
    repeatSelect: null,
    availableOptions: [
      {id: 'success', name: 'success'},
      {id: 'info', name: 'info'},
      {id: 'danger', name: 'danger'}
    ]
   };
}]);