var invalid = false;

var regApp = angular.module('registerApp',[]);
regApp.controller('registerCtrl', function($scope){

    $scope.namePattern = /^[a-zA-Z]+(['-]?[a-zA-Z]+)*( [a-zA-Z]+(['-]?[a-zA-Z]+)*)*$/; 
    $scope.emailPattern = /^[\w.]+@[a-zA-Z_]+(\.[a-zA-Z]{2,6})+$/;
    $scope.usernamePattern = /^[A-Za-z0-9._-]{3,16}$/;
    $scope.confirmPassword = function(){
        if($.trim($scope.confirm) != '')
            return($scope.password != $scope.confirm);
    };
    
});

function isValidEmail(data) {
    if($.trim(data) != "")
    {
        var emailRegex = /^[\w.]+@[a-zA-Z_]+(\.[a-zA-Z]{2,6})+$/;
        var pattern = new RegExp(emailRegex);
        if(pattern.test(data))
        {
            return false;
        }
        else
            return true;
    }
}

function isValidUsername(data) {
    if($.trim(data) != "")
    {
    var usernameRegex = /^[A-Za-z0-9._-]{3,16}$/; 
    var pattern = new RegExp(usernameRegex);
    if(pattern.test(data))
    {
        return false;
    }
    else
        return true;
            
    }
}

function isValidPassword(data) {
    if($.trim(data) != "")
    {
        var passwordRegex = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30})/gm; 
        var pattern = new RegExp(passwordRegex);
        if(pattern.test(data))
        {
            return false;
        }
        else
        {
            return true; 
        }
    } 
}

function isValidConfirmPassword(data){
    if(data == $('.form-field input[name="password"]').val())
        return true;
    else
        return false;
}

function isValidDate(data) {
    var dateRegex = /^\d{4}-\d{2}-\d{2}$/; 
    var pattern = new RegExp(dateRegex);
    console.log(data);
    return pattern.test(data);
}

function isValidName(data) {
    if($.trim(data) != "")
    {
        var nameRegex = /^[a-zA-Z]+(['-]?[a-zA-Z]+)*( [a-zA-Z]+(['-]?[a-zA-Z]+)*)*$/mg; 
        var pattern = new RegExp(nameRegex);
        if(pattern.test(data))
        {
            return false;
        }
        else
            return true;
    }
}

function isValidPhone(data) {
    var phoneRegex = /^[\d-()+]{7,17}$/; 
    var pattern = new RegExp(phoneRegex);
    return pattern.test(data);
}

function isValidURL(data) {
    var urlRegex = /^(https?:\/\/)?([\w-]+)\.([a-z.]{2,6})([\w .\/-]*)*\/?$/; 
    var pattern = new RegExp(urlRegex);
    return pattern.test(data);
}

function isValidImage(data) {
    var imageRegex = /([^\s]+(?=(\.jpg|\.jpeg|\.gif|\.png|\.bmp)))/gm; 
    var pattern = new RegExp(imageRegex);
    return pattern.test(data);
}

function isEmptyString(data){
    if($.trim(data) == "")
        return false;
}