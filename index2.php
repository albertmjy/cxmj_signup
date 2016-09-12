<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		<script type="text/javascript" src="js/angular.min.js" ></script>
	</head>

	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="#">
		      	<!--<img class="logo" src="img/getheadimg.jpeg" alt="logo" />-->
		      	
		      </a>
		    </div>
		  </div>
		</nav>
		<div class="container-fluid">
				
		<div class="panel">
			<div class="panel-heading">
				<img class="logo" src="img/1244782443.jpg" alt="logo" />
			</div>
			<div class="panel-body">
				<div ng-app='form' ng-controller='formCtrl'>
				<!--<img class="head-img" src="http://wx.qlogo.cn/mmopen/9M0PhLTmTIch24EL86awR6CUoGEpXaaSDFjNruCsQRNULdkJqWkQxIibUchz0h5vTI9jnhWfpStCAuia47xN7ZU2GqtP7FEegN/0" />-->
				<form enctype="application/x-www-form-urlencoded" id="reg_activity" name="reg_activity" action="model/reg_activity.php">
					
					<div class="form-group">
						<label for="user" class="sr-only">user:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
								</span>
							<input ng-model='user' required="" type="text" class="form-control" name="user" id="user" placeholder="{{namePlaceholder}}" data-toggle="tooltip" data-placement="top" title="Please enter a valid name!" />
							<span class="glyphicon glyphicon-ok form-control-feedback" ng-show='reg_activity.user.$valid'></span>
							<span class="glyphicon glyphicon-remove-sign form-control-feedback" ng-show='reg_activity.user.$dirty && reg_activity.user.$invalid'></span>
						</div>
					</div>
					<div class="form-group">
						<label for="mobile" class="sr-only">mobile:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-phone"></span>
								</span>
							<input ng-modle='mobile' required="required" type="number" class="form-control" name="mobile" id="mobile" placeholder="{{mobilePlaceholder}}" />
						</div>
					</div>
					
					<div class="">
						<div class="form-group">
						    <label class="sr-only" for="tea_age">Tea Age</label>
						    
						    <div class="input-group">
						      <div class="input-group-addon">茶龄</div>
						      <select ng-model='tea_age' required="required" id="tea_age" name="tea_age" class="form-control">
						      	<option value="">－选择－</option>
						      	<option ng-repeat='x in tea_age_data' value="{{x.value}}">{{x.text}}</option>
						      </select>
						      <span class="glyphicon glyphicon-ok form-control-feedback" ng-show='reg_activity.tea_age.$valid'></span>
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <!--<label class="sr-only" for="amount">Amount</label>-->
						    <div class="input-group">
						      <div class="input-group-addon">{{amountLabel}}</div>
						      <select ng-model='amt' required="required" id="amt" name="amt" class="form-control">
						      	<option value="">－参与的人数－</option>
						      	<option ng-repeat='x in amount_data' value="{{x.value}}">{{x.text}}</option>
						      </select>
						    </div>
						  </div>
						  
						  <!--<div class="form-group">
						  <div class="input-group">
						  	<div class="input-group-addon">{{amountLabel}}</div>
						  <select ng-model='am' required="required" id="am" name="am" class="form-control">
						      	<option value="">－参与的人－</option>
						      	<option ng-repeat='x in amount' value="{{x.value}}">{{x.text}}</option>
						      </select>
						  </div>
						  </div>-->
						  
					  	<div class="form-group">
						    <label class="sr-only" for="date">date</label>
						    <div class="input-group">
						      <div class="input-group-addon">{{dateLabel}}</div>
						      <select ng-model='date' required="required" id="date" name="date" class="form-control">
						      	<option value="0">－选择参加的日期－</option>
						      	<?php include "lib/util.php";
									$tue = nextTuesday();
									$sun = nextSunday();
									$t_text = date_format($tue, "Y-m-d, l");
									$t_value = date_format($tue, "Y-m-d H:i:s");
									$s_text = date_format($sun, "Y-m-d, l");
									$s_value = date_format($sun, "Y-m-d H:i:s");
									
									echo "<option value='". $t_value . "'>" . $t_text . "</option>";
									echo "<option value='". $s_value . "'>" . $s_text . "</option>";
								?>
						      </select>
						    </div>
						  </div>
					  </div>
					  	<?php
//					  		$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
//							$months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							
//							date_default_timezone_set('Asia/Shanghai');
//							echo date("Y-m-d H:i:s"); // mysql date format
							
//							$w = date("M", date_create());
//							echo date("d");
//							$dd = date_add(date_create(), date_interval_create_from_date_string("10 days"));
//							print_r($dd);
//							echo "c". $dd->date;
//							echo date_format(date_create(), "Y-m-d H:i:s") ;
//							echo gettype( getdate());
							
//							$now = date_create();
//							print_r(getdate());
							
//							$tue = nextTuesday();
//							print_r($tue->format("Y-m-d H:i:s") . "<br />");
//							$sun = nextSunday();
//							print_r($sun->format("Y-m-d H:i:s"));
							
//							echo date_format($date, "Y-m-d H:i:s");
//							print_r($date);
//							echo "<br /><br />". $date->format("U") ." <br /><br />";
							
//							date_date_set($date,2020,10,38);
//							echo "<br />". date_format($date,"Y/m/d");
							
//							echo "next sunday " . date("Y-m-d H:i:s", strtotime("this sunday"));
							
//							print_r(getdate());
	
					  	?>
					  
					<button type="submit" class="btn btn-info btn-block" ng-disabled='reg_activity.user.$invalid || 
						reg_activity.mobile.$invalid || reg_activity.tea_age.$invalid ||
						reg_activity.amount.$invalid || reg_activity.date.$invalid'>确认报名！</button>
					
				</form>
				</div>
				
			</div>
		
		</div>
		</div>
<input type="text" class="btn btn-default" data-toggle="tooltip" data-placement="right" title="Tooltip on right" />	

<!-- Generated markup by the plugin -->

		<footer>
			<nav class="navbar">
				<hr />
			  <p>&copy; 2016 Company, Inc.</p>
		</nav>
		</footer>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<!--<script type="text/javascript" src="js/main.js"></script>-->
		<script>
			var app = angular.module("form", [])
			app.controller("formCtrl", function($scope){
				$scope.namePlaceholder = "您的称呼..."
				$scope.mobilePlaceholder = "您的手机号..."
				$scope.amountLabel = "人数"
				$scope.dateLabel = "日期"
				
				$scope.tea_age_data = [
					{text:"少于1年", value:"0"},
					{text:"1 年", value:"1"},
					{text:"2 年", value:"2"},
					{text:"3 年", value:"3"},
					{text:"4 年", value:"4"},
					{text:"超过 5 年", value:"5"},
				]
				$scope.amount_data = [
					{text:"1 人", value:"1"},
					{text:"2 人", value:"2"},
					{text:"3 人", value:"3"},
					{text:"4 人", value:"4"},
					{text:"5 人", value:"5"},
				]

			})
			
//			$("[data-toggle='tooltip']").tooltip({
//				trigger: "click"
//			})
		</script>
	</body>

</html>