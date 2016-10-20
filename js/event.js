
var app = angular.module('eventApp', [])

app.controller('eventCtrl', function($scope, $http){
	console.log(1231232312)


	$scope.numOnly = function(e){
		var keycode = e.which || e.keycode
		var char = String.fromCharCode(keycode)

		// prevent the key event when it's not a number
		if (char.search(/^[0-9]$/) < 0){
			e.preventDefault()
		} 

	}

	// 
	$scope.mobValid = false
	$scope.mobileValidation = function(mobile){
		if (mobile.match(/^0?(13[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/)){
			$scope.mobValid = true
			console.log("valid")
		} else {
			$scope.mobValid = false
			console.log("invalid!")
		}
	}
})


app.directive('mobileDirective', function(){
	return{
		require: 'ngModel',
		link: function(scope, elem, attr, mCtrl){
			function myValidation(value){
				// console.log(value)
				// if (value.indexOf("e") > -1) {
		  //         mCtrl.$setValidity('charE', true);
		  //       } else {
		  //         mCtrl.$setValidity('charE', false);
		  //       }

		  		if (value.search(/^[0-9]{11}$/)>-1){
		  			console.log("mobile is valid")
		  			mCtrl.$setValidity('charE', true)
		  		} else {
		  			console.log("mobile is invalid")
		  			mCtrl.$setValidity('charE', false)
		  		}
		        return value;
			}
			mCtrl.$parsers.push(myValidation);
		}
	}
})


function _getToken(){
	var appId = "wx5f08243f1028e98e"
	var appSecreat = "7ad6fcbb9aff7c8c6fb1ac9995bf0574"

}