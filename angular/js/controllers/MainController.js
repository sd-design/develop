app.controller('MainController', function($scope, $http) {

	 $http.get("/angular/js/controllers/data.json").then(function(response) {
         $scope.apps = response.data;

    });

});