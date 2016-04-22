angular.module('ajaxApp', [])
 .controller('AjaxController', function($scope, $http) {

$scope.sendRequest = function (){

	$http({method: 'GET', url: '/angular/data/data.json'}).success(function (response){

		$scope.items = response;
	})
}
 
   });