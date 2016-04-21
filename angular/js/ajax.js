angular.module('ajaxApp', [])
 .controller('AjaxController', function($scope, $http) {

$scope.SendRequest = function (){

	$http.get('contact.html').success(function (response){

		$scope.page = response;
	}

		)
}
 
   });