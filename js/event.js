




var app = angular.module('eventApp', [])
app.controller('eventCtrl', function($scope, $http){
	// init process
	$scope.hasTeaAge = false
	$scope.hasDate = false
	$scope.btnSubmitText = "确认报名！"
	$scope.init = function(){
		// load form data if any
		var lst = localStorage
		$scope.name = lst.getItem("name")
		$scope.mobile = parseInt(lst.getItem("mobile"))
		$scope.idx = parseInt(lst.getItem("tea_age_in_range_idx"))
		if ($scope.idx){
			$scope.hasTeaAge = true
		}
	}
	$scope.init()


	$scope.tst = function(){
		console.log($scope.tea_age_arr)
	}

	// @Deprecated 
	// allow only number input, call for each key press
	$scope.numOnly = function(e){
		var keycode = e.which || e.keycode
		var char = String.fromCharCode(keycode)

		// prevent the key event when it's not a number
		if (char.search(/^[0-9]$/) < 0){
			e.preventDefault()
		} 
	}



	// validate the the mobile pattern when blur event
	// $scope.mob = ""
	$scope.mobValid = false
	$scope.mobCompleted = false // completed when length=11
	$scope.mobileValidation = function(mobile){
		console.log(mobile)
		// if (!mobile) return


		mobile = mobile.toString() // convert number to string

		// verify the mobile is completed
		if(mobile.length < 11){
			$scope.mobCompleted = false
		} else {
			$scope.mobCompleted = true
		}
		// verify the mobile is match the pattern
		if (mobile.match(/^0?(13[0-9]|15[012356789]|18[02356789]|14[57])[0-9]{8}$/)){
			$scope.mobValid = true
			console.log("valid")
		} else {
			$scope.mobValid = false
			console.log("invalid!")
		}
	}

	// incase cached mobile
	if ($scope.mobile){
		$scope.mobileValidation($scope.mobile)
	}
	// // date select event
	// // $scope.dateSelected = {"tue": false, "sun": false}
	// $scope.dateSelected = []
	// $scope.selectDate = function(d){
	// 	// scopeDate = d
	// 	$scope.date = d
	// 	// var changeStatus = !$scope.dateSelected[d]
	// 	// reset all
	// 	for (k in $scope.dateSelected){
	// 		scopeDate = ""
	// 		$scope.dateSelected[k] = false
	// 	}
	// 	$scope.dateSelected[d] = true
	// }

	$scope.dateSelected = []
	// var availableDate = [0, 2]
	// var nextTue = _nextTuesdayDate() //_localTimezon(_nextTuesdayDate())
	// var nextFri = _nextFridayDate()//_localTimezon(_nextFridayDate())
	// var nextSun = _nextSundayDate()//_localTimezon(_nextSundayDate())
	var nextTue = _localTimezone(_nextTuesdayDate())
	var nextFri = _localTimezone(_nextFridayDate())
	var nextSun = _localTimezone(_nextSundayDate())
	$scope.next_tuesday = nextTue.toJSON().substr(0,10) + "," + daysCN[2]
	$scope.next_tuesday_value = nextTue.toJSON()
	$scope.next_friday = nextFri.toJSON().substr(0,10) + "," + daysCN[5]
	$scope.next_friday_value = nextFri.toJSON()
	$scope.next_sunday = nextSun.toJSON().substr(0,10) + "," + daysCN[0]
	$scope.next_sunday_value = nextSun.toJSON()

	// @Deprecate
	$scope.newSelectDate = function(d){
		$scope.date = (d==0?$scope.next_sunday:$scope.next_tuesday)
		// reset all
		for (i in $scope.dateSelected) {
			$scope.dateSelected[i] = false
		}
		$scope.dateSelected[d] = true

		return false
	}
	$scope.dateSelected = false
	$scope.dateSelect = function(){
		$scope.dateSelected = true
	}

	// @Deprecate
	//  tea age select event
	$scope.tea_age_range = ['0-3', '3-5', '5-10', '>10']
	$scope.teaAgeSelected = []
	$scope.selectTeaAge = function(idx){
		console.log(idx, $scope.tea_age_range[idx], $scope.teaAgeSelected[idx])

		$scope.tea_age = $scope.tea_age_range[idx] // save the value in hidden field
		// var changeToStatus = !$scope.teaAgeSelected[idx]
		// reset all
		for (i in $scope.teaAgeSelected){
			$scope.teaAgeSelected[i] = false
		}
		$scope.teaAgeSelected[idx] = true

		console.log($scope.tea_age)

		return false
	}

	// amount click event
	$scope.amountCh = ["", "yi", "er", "san"]
	$scope.amount = 1
	$scope.minusPerson = function(){
		if ($scope.amount > 1){
			$scope.amount--
		}
	}
	$scope.pulsPerson = function(){
		$scope.amount++
	}


	var scopeDate = ""
	var scopeTeaAgeRange = ""
	// submit event
	// $scope.teaAge = 1
	$scope.submit = function(valid){
		if (valid){
			document.eventForm.submit()
		}
	}

	$scope.cacheData = function(){
		console.log("-----Cache Data----")
		var lst = localStorage
		lst.setItem("name", $scope.name)
		lst.setItem("mobile", $scope.mobile)
		lst.setItem("date", $scope.date)

		// do this since bootstrop didn't directly set the value to btn-like checkbox, the status never changed
		// manually save the value
		for (var i = 0; i < eventForm.tea_age_in_range.length; i++) {
			if (eventForm.tea_age_in_range[i].checked){
				lst.setItem("tea_age_in_range_idx", i)
			}
		};
		lst.setItem("tea_age_in_range", eventForm.tea_age_in_range.value)

		lst.setItem("amount", $scope.amount)
	}

	$scope.disableSubmit = function(){
		eventForm.btnSubmit.disabled = true
		$scope.btnSubmitText = "正在提交。。。"
		console.log("-----Disable Submit----")
		return false
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


var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
var daysCN = ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'];
var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	
function _nextTuesdayDate(){
	var now = new Date();
	var day = now.getDay();
	var date = now.getDate()
	
	var date_diff = 2 - day;
	if (day>=0 && day<=2){
		now.setDate(date + date_diff)
	} else {
		now.setDate(date + date_diff +7)
	}
	
	return now
}

function _nextSundayDate(){
	var now = new Date();
	var day = now.getDay();
	var date = now.getDate()
	
	var date_diff = 0 - day;
	now.setDate(date + date_diff +7)
	
	return now
}

function _nextFridayDate(){
	var now = new Date();
	var day = now.getDay();
	var date = now.getDate()
	
	var date_diff = 5 - day;
	if (day>=0 && day<=5){
		now.setDate(date + date_diff)
	} else {
		now.setDate(date + date_diff +7)
	}
	
	return now
}

function _localTimezone(d){
	d.setUTCMinutes(d.getUTCMinutes() - d.getTimezoneOffset())
	return d
}