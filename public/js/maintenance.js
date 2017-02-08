var app = angular.module('angularApp',[]);
app.controller('brandCtrl', function($scope,$http){ // BRAND CONTROLLER
	$scope.isEdit = false;
	$scope.num = 0;
	$scope.brands = JSON.parse( jQuery('#modalBrands').attr('data-init'));
	$scope.addBrand = function()
	{
		if(!$scope.newBrand)
			return ;
		if(!contains($scope.brands, $scope.newBrand))
		{
			$scope.brands.push({name: $scope.newBrand});

			$http({
		        method : "POST",
		        url : "/brandSave",
		        data: {
		        	name: $scope.newBrand
		        }
		    });

		    $scope.newBrand = "";
		}
		else
		{
			alert("Brand already exists");
		}
	};
	$scope.removeBrand = function(x)
	{
		var brandSelected = $scope.brands[x].name;
		var confirmed = confirm("Are you sure you want to remove "+brandSelected+" from the list?");
		if (confirmed == true) {
		    $http.get('/brandRemove/'+$scope.brands[x].name);
			$scope.brands.splice(x,1);
			alert(brandSelected + " has been removed.");
		}
	};
	$scope.updateBrand = function(x)
	{
		var brandSelected = $scope.brands[x].name;
		var brandEdited = jQuery('#brandEdit'+x).val();
		console.log(brandEdited);
		$http.get('/brandUpdate/'+brandSelected+'/'+brandEdited)
		.then(function (response) {
			$scope.brands[x].name = brandEdited;
			alert('Record Updated');
		});
		$scope.setEdit(false,x);
		jQuery('#brandEdit'+x).val($scope.brands[x].name);
	};
	$scope.setEdit = function(x,index){
		$scope.num = index;
		$scope.isEdit = x;
		jQuery('#brandEdit'+index).val($scope.brands[index].name);
	};
});

app.controller('categoriesCtrl', function($scope,$http){ // CATEGORY CONTROLLER
	$scope.isEdit = false;
	$scope.num = 0;
	$scope.categories = JSON.parse( jQuery('#modalCategories').attr('data-init'));
	$scope.addCategory = function()
	{
		if(!$scope.newCategory)
			return ;
		if(!contains($scope.categories, $scope.newCategory))
		{
			$scope.categories.push({name: $scope.newCategory});

			$http({
		        method : "POST",
		        url : "/categorySave",
		        data: {
		        	name: $scope.newCategory
		        }
		    });

		    $scope.newCategory = "";
		}
		else
		{
			alert("Category already exists");
		}
	};
	$scope.removeCategory = function(x)
	{
		var categorySelected = $scope.categories[x].name;
		var confirmed = confirm("Are you sure you want to remove "+categorySelected+" from the list?");
		if (confirmed == true) {
		    $http.get('/categoryRemove/'+$scope.categories[x].name);
			$scope.categories.splice(x,1);
			alert(categorySelected + " has been removed.");
		}
	};
	$scope.updateCategory = function(x)
	{
		var categorySelected = $scope.categories[x].name;
		var categoryEdited = jQuery('#categoryEdit'+x).val();
		console.log(categoryEdited);
		$http.get('/categoryUpdate/'+categorySelected+'/'+categoryEdited)
		.then(function (response) {
			$scope.categories[x].name = categoryEdited;
			alert('Record Updated');
		});
		$scope.setEdit(false,x);
		jQuery('#categoryEdit'+x).val($scope.categories[x].name);
	};
	$scope.setEdit = function(x,index){
		$scope.num = index;
		$scope.isEdit = x;
		jQuery('#categoryEdit'+index).val($scope.categories[index].name);
	};
});

app.controller('sizesCtrl', function($scope,$http){ // SIZE CONTROLLER
	$scope.isEdit = false;
	$scope.num = 0;
	$scope.sizes = JSON.parse( jQuery('#modalSize').attr('data-init'));
	$scope.addSize = function()
	{
		if(!$scope.newSize)
			return ;
		if(!contains($scope.sizes, $scope.newSize))
		{
			$scope.sizes.push({name: $scope.newSize});

			$http({
		        method : "POST",
		        url : "/sizeSave",
		        data: {
		        	name: $scope.newSize
		        }
		    });

		    $scope.newSize = "";
		}
		else
		{
			alert("Size already exists");
		}
	};
	$scope.removeSize = function(x)
	{
		var sizeSelected = $scope.sizes[x].name;
		var confirmed = confirm("Are you sure you want to remove "+sizeSelected+" from the list?");
		if (confirmed == true) {
		    $http.get('/sizeRemove/'+$scope.sizes[x].name);
			$scope.sizes.splice(x,1);
			alert(sizeSelected + " has been removed.");
		}
	};
	$scope.updateSize = function(x)
	{
		var sizeSelected = $scope.sizes[x].name;
		var sizeEdited = jQuery('#sizeEdit'+x).val();
		console.log(sizeEdited);
		$http.get('/sizeUpdate/'+sizeSelected+'/'+sizeEdited)
		.then(function (response) {
			$scope.sizes[x].name = sizeEdited;
			alert('Record Updated');
		});
		$scope.setEdit(false,x);
		jQuery('#sizeEdit'+x).val($scope.sizes[x].name);
	};
	$scope.setEdit = function(x,index){
		$scope.num = index;
		$scope.isEdit = x;
		jQuery('#sizeEdit'+index).val($scope.sizes[index].name);
	};
});


function contains(inArr, brand)
{
    for (i = 0; i < inArr.length; i++ )
    {
        if (inArr[i].name.toUpperCase() == brand.toUpperCase())
            return true;
    }
    return false;
}