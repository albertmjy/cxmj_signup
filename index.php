<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title></title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
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
				
				<!--<img class="head-img" src="http://wx.qlogo.cn/mmopen/9M0PhLTmTIch24EL86awR6CUoGEpXaaSDFjNruCsQRNULdkJqWkQxIibUchz0h5vTI9jnhWfpStCAuia47xN7ZU2GqtP7FEegN/0" />-->
				<form enctype="application/x-www-form-urlencoded" id="reg_activity" action="model/reg_activity.php">
					<div class="form-group">
						<label for="mobile" class="sr-only">name:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
								</span>
							<input required="" type="text" class="form-control" name="name" id="name" placeholder="您的称呼..." data-toggle="tooltip" data-placement="top" title="Please enter a valid name!" />
						</div>
					</div>
					<div class="form-group">
						<label for="mobile" class="sr-only">mobile:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-phone"></span>
								</span>
							<input required="required" type="number" class="form-control" name="mobile" id="mobile" placeholder="您的手机号..." />
						</div>
					</div>
					
					<div class="">
						<div class="form-group">
						    <label class="sr-only" for="tea_age">Tea Age</label>
						    
						    <div class="input-group">
						      <div class="input-group-addon">茶龄</div>
						      <select required="required" id="tea_age" name="tea_age" class="form-control">
						      	<option value="">－选择－</option>
						      	<option value="0"> 少于 1 年</option>
						      	<option value="1">1 年</option>
						      	<option value="2">2 年</option>
						      	<option value="3">3 年</option>
						      	<option value="4">4 年</option>
						      	<option value="5">5 年</option>
						      	<option value="6">6 年</option>
						      	<option value="7">7 年</option>
						      	<option value="8">8 年</option>
						      	<option value="9">9 年</option>
						      	<option value="10">超过 10 年</option>
						      </select>
						      <!--<div class="input-group-addon">year</div>-->
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <label class="sr-only" for="amount">Amount</label>
						    <div class="input-group">
						      <div class="input-group-addon">人数</div>
						      <select required="required" id="amount" name="amount" class="form-control">
						      	<!--<option value="0">－参与的人数－</option>-->
						      	<option value="1">1 人</option>
						      	<option value="2">2 人</option>
						      	<option value="3">3 人</option>
						      	<option value="4">4 人</option>
						      	<option value="5">5 人</option>
						      </select>
						      <!--<div class="input-group-addon">year</div>-->
						    </div>
						  </div>
						  
					  	<div class="form-group">
						    <label class="sr-only" for="date">date</label>
						    <div class="input-group">
						      <div class="input-group-addon">日期</div>
						      <select required="required" id="date" name="date" class="form-control">
						      	<option value="0">－选择参加的日期－</option>
						      	<?php include "lib/util.php";
									$tue = nextTuesday();
									$sun = nextSunday();
									$fri = nextFriDay();
									$t_text = date_format($tue, "Y-m-d, l");
									$t_value = date_format($tue, "Y-m-d H:i:s");
									$s_text = date_format($sun, "Y-m-d, l");
									$s_value = date_format($sun, "Y-m-d H:i:s");
									$f_text = date_format($fri, "Y-m-d, l");
									$f_value = date_format($fri, "Y-m-d H:i:s");

									echo "<option value='". $t_value . "'>" . $t_text . "</option>";
									echo "<option value='". $f_value . "'>" . $f_text . "</option>";
									echo "<option value='". $s_value . "'>" . $s_text . "</option>";
									
								?>
						      </select>
						      
						    </div>
						    <!-- <div class="">周五也能报名啦！</div> -->
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
					  
					<button type="submit" class="btn btn-info btn-block">确认报名！</button>
					
				</form>
				
				<!--<form class="form" action="">
					<div class="radio">
					  <label class="radio-inline">
					    <input type="radio" name="gender" id="male" value="male" checked> Mr.
					  </label>
					  <label class="radio-inline">
					    <input type="radio" name="gender" id="female" value="female" checked> Mrs.
					  </label>
					</div>
					<div class="form-group">
						<label for="name" class="sr-only">Name</label>
						<div class="input-group">
							<span class="input-group-btn">
						        <button class="btn btn-default" type="button">
						        		<span class="glyphicon glyphicon-user"></span>
						        </button>
						      </span>
							<input type="text" class="form-control" id="name" placeholder="Your Name..." />
						</div>
					</div>
					<div class="form-group">
						<label for="mobile" class="sr-only">mobile:</label>
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-phone"></span>
								</span>
							<input type="number" class="form-control" id="mobile" placeholder="Mobile..." />
						</div>
					</div>
					<div class="form-group">
						<textarea class="form-control" placeholder="Additional message..."></textarea>
					</div>
					
					<button type="submit" class="btn btn-info btn-block">Submit</button>
				</form>-->
				
			</div>
		
		</div>
		</div>
		
		<footer>
			<nav class="navbar">
				<hr />
			  <p>&copy; 2016 Company, Inc.</p>
		</nav>
		</footer>
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</body>

</html>