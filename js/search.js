//var ap = angular.module("myapp", [])
//
//ap.controller('myc', function($scope){
//	$scope.showSearch = function(){
//		alert('hehe')
//	}
//})

var app = angular.module("search",[])


app.controller('tbCtrl', function($scope, $http) {

})

app.controller('searchList', function($scope, $http) {

	
})

app.controller('ngnavCtrl', function($scope, $http, $timeout) {
	
	
//	$scope.labelActive = []
	
	
	var startYear = 2014
	var currentYear = (new Date()).getFullYear()
	$scope.years = []
	for(var y = startYear; y <= currentYear; y++) {
		$scope.years.push(y)
	}

	$scope.showDetails = false
	

	$scope.showSearch = function() {
		$scope.showDetails = true
		var el = angular.element(document.querySelector(".disp-pane"))
		el.css("animation", "slidein 0.5s ")
	}
	$scope.hideSearch = function() {
		var el = angular.element(document.querySelector(".disp-pane"))
		el.css("animation", "slideout 0.5s ")
		
		$timeout(function(){
			$scope.showDetails = false
		}, 500)
		
	}

	
	var prod_year = []
	var technic = []
	
	$scope.toggleFilterItem = function(self, model) {
//		console.log(self)
//		console.log("scope:" +$scope.ngClass)
//		console.log("this:" +this.ngClass)

		if (!self.ngClass){
			self.ngClass = "label-info"
			
			if(model=="prod_year"){
				prod_year.push(self.x)
			} else {
				technic.push(self.x)
			}
		} else{
			self.ngClass = ""
			
			if(model=="prod_year"){
				prod_year.splice(prod_year.indexOf(self.x), 1)
			} else {
				technic.splice(technic.indexOf(self.x), 1)
			}
		}
		
		console.log(prod_year)
		console.log(technic)
	}
	
	$scope.prod_name = ""
	$scope.brand = ""
	$scope.weight = ""
	$scope.price_low = ""
	$scope.price_high = ""
	
	$scope.submitFilter = function(){
		console.log($scope.prod_name)
		console.log($scope.brand)
		console.log($scope.weight)
		console.log(technic)
		console.log(prod_year)
		console.log($scope.price_low)
		console.log($scope.price_high)
		console.log($scope)
		
		var url = "model/search-list.php?filter=true&prod_name=" + $scope.prod_name + "&brand=" + $scope.brand + 
											"&weight=" + $scope.weight + "&technic=" + technic + "&prod_year=" + prod_year + 
											"&price_low=" + $scope.price_low + "&price_high=" + $scope.price_high
		
		
		
		$http.get(url).then(function(response){
			console.log("scope : ")
			console.log($scope)
			$scope.tea = response.data
			console.log("filtered list: " + response.data)
			$scope.imgloadingshow = false
			
		})
		$scope.imgloadingshow = true
		$scope.hideSearch()
		
	}
	
	$scope.imgloadingshow = true
	$http.get("model/search-list.php").then(function(response) {
		$scope.tea = response.data
		$scope.imgloadingshow = false
		console.log("init scope: ")
		console.log($scope)
	})
	
//	$scope.$watch('tea', function(newValue, oldValue) {
//	  alert("teatea")
//	});

	$scope.arar = ["aa", "bb,", "cc"]
	$scope.doit = function(){
		console.log($scope)
		$scope.arar = []
		$scope.tea = []
	}
})