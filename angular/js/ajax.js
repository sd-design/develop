angular.module('ajaxApp', [])
 .controller('AjaxController', function($scope, $http) {

$scope.sendRequest = function (){

	$http.get('/angular/data/data.json').then(function(response) {
   $scope.items = response.data;
  });
}

$scope.sendRequest2 = function (){

	$http.get('/angular/data/data.php').then(function(response) {

		$scope.items = response.data;
	})
}
 
 $scope.sendRequest3 = function (){

	$http.post('/angular/data/orders.php').then(function(response) {

$scope.posts = response.data; // response data 
})
}
 $scope.sendClear = function (){

$scope.posts = ''; // response data 
$scope.items = '';

}

   });