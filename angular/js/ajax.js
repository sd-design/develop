angular.module('ajaxApp', [])
 .controller('AjaxController', function($scope, $http) {

$scope.sendRequest = function (){

	$http({method: 'GET', url: '/angular/data/data.json'}).success(function (response){

		$scope.items = response;
	})
}

$scope.sendRequest2 = function (){

	$http({method: 'GET', url: '/angular/data/data.php'}).success(function (response){

		$scope.items = response;
	})
}
 
 $scope.sendRequest3 = function (){

	$http({method: 'POST', url: '/angular/data/orders.php'}).success(function(data)
{
$scope.posts = data; // response data 
})
}
   });