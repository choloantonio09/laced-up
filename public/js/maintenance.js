var app = angular.module('angularApp',[]);
app.controller('brandCtrl', function($scope){
	$scope.brands = JSON.parse( jQuery('#modalBrands').attr('data-init'));
	console.log($scope.brands);
});